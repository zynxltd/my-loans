<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LoanApplicationController extends Controller
{
    public function show()
    {
        return view('apply');
    }

    public function submit(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'loan_amount' => 'required|numeric|min:500|max:50000',
            'loan_term' => 'required|integer|min:1|max:6',
            'loan_purpose' => 'required|integer|min:1|max:9',
            'loan_count' => 'required|integer|min:1|max:5',
            'title' => 'required|integer|min:1|max:4',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'mobile_phone' => 'required|string|max:20',
            'home_phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'marital_status' => 'required|integer|min:1|max:6',
            'dependants' => 'required|integer|min:1|max:5',
            'adults_living_with' => 'required|integer|min:1|max:5',
            'residential_status' => 'required|integer|min:1|max:6',
            'house_name_number' => 'required|string|max:100',
            'street_address' => 'required|string|max:255',
            'county' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'address_years' => 'required|integer|min:1|max:5',
            'employment_status' => 'required|integer|min:1|max:6',
            'employer_name' => 'required_if:employment_status,1,2,3|string|max:255',
            'job_title' => 'required_if:employment_status,1,2,3|string|max:255',
            'work_phone' => 'required_if:employment_status,1,2,3|string|max:255',
            'employer_years' => 'required_if:employment_status,1,2,3|integer|min:1|max:5',
            'employer_months' => 'required_if:employment_status,1,2,3|integer|min:1|max:3',
            'employment_industry' => 'required_if:employment_status,1,2,3|integer|min:1|max:19',
            'income_frequency' => 'required|integer|min:1|max:6',
            'next_pay_date' => 'required|string|max:255',
            'following_pay_date' => 'required|string|max:255',
            'net_monthly_income' => 'required|numeric|min:0',
            'retirement_pension' => 'required|numeric|min:0',
            'government_benefits' => 'required|numeric|min:0',
            'other_benefits' => 'required|numeric|min:0',
            'mortgage_rent' => 'required|numeric|min:0',
            'credit' => 'required|numeric|min:0',
            'utility' => 'required|numeric|min:0',
            'food' => 'required|numeric|min:0',
            'transport' => 'required|numeric|min:0',
            'other' => 'required|numeric|min:0',
            'direct_deposit' => 'required|integer|min:1|max:3',
            'bank_account_type' => 'required|integer|min:1|max:6',
            'bank_account_number' => 'required|string|max:8',
            'bank_sort_code' => 'required|string|max:6',
            'bank_years' => 'nullable|integer|min:1|max:5',
            'marketing_sms' => 'nullable|boolean',
            'marketing_phone' => 'nullable|boolean',
            'marketing_email' => 'nullable|boolean',
        ]);

        // Prepare API data
        $apiData = [
            'AffID' => config('app.affiliate_id', 'myloans001'),
            'OfferID' => config('app.offer_id', 12345),
            'Campaign' => 'myloans-uk',
            'CreationUrl' => $request->url(),
            'ReferrerUrl' => $request->header('referer', ''),
            'IpAddress' => $request->ip(),
            'UserAgent' => $request->header('user-agent', ''),
            'LoanAmount' => $validated['loan_amount'],
            'LoanTerm' => $validated['loan_term'],
            'LoanPurpose' => $validated['loan_purpose'],
            'LoanCount' => $validated['loan_count'],
            'Title' => $validated['title'],
            'FirstName' => $validated['first_name'],
            'LastName' => $validated['last_name'],
            'DateOfBirth' => $validated['date_of_birth'],
            'MobilePhone' => $validated['mobile_phone'],
            'HomePhone' => $validated['home_phone'],
            'Email' => $validated['email'],
            'MaritalStatus' => $validated['marital_status'],
            'Dependants' => $validated['dependants'],
            'AdultsLivingWith' => $validated['adults_living_with'],
            'ResidentialStatus' => $validated['residential_status'],
            'HouseNameNumber' => $validated['house_name_number'],
            'StreetAddress' => $validated['street_address'],
            'County' => $validated['county'],
            'City' => $validated['city'],
            'Postcode' => $validated['postcode'],
            'AddressYears' => $validated['address_years'],
            'EmploymentStatus' => $validated['employment_status'],
            'IncomeFrequency' => $validated['income_frequency'],
            'NextPayDate' => $validated['next_pay_date'],
            'FollowingPayDate' => $validated['following_pay_date'],
            'NetMonthlyIncome' => $validated['net_monthly_income'],
            'RetirementPension' => $validated['retirement_pension'],
            'GovernmentBenefits' => $validated['government_benefits'],
            'OtherBenefits' => $validated['other_benefits'],
            'MortgageRent' => $validated['mortgage_rent'],
            'Credit' => $validated['credit'],
            'Utility' => $validated['utility'],
            'Food' => $validated['food'],
            'Transport' => $validated['transport'],
            'Other' => $validated['other'],
            'DirectDeposit' => $validated['direct_deposit'],
            'BankAccountType' => $validated['bank_account_type'],
            'BankAccountNumber' => $validated['bank_account_number'],
            'BankSortCode' => $validated['bank_sort_code'],
            'MarketingSms' => $validated['marketing_sms'] ?? false,
            'MarketingPhone' => $validated['marketing_phone'] ?? false,
            'MarketingEmail' => $validated['marketing_email'] ?? false,
        ];

        // Add conditional fields
        if (in_array($validated['employment_status'], [1, 2, 3])) {
            $apiData['EmployerName'] = $validated['employer_name'];
            $apiData['JobTitle'] = $validated['job_title'];
            $apiData['WorkPhone'] = $validated['work_phone'];
            $apiData['EmployerYears'] = $validated['employer_years'];
            $apiData['EmployerMonths'] = $validated['employer_months'];
            $apiData['EmploymentIndustry'] = $validated['employment_industry'];
        }

        if ($validated['bank_years']) {
            $apiData['BankYears'] = $validated['bank_years'];
        }

        // Submit to API
        try {
            $response = Http::timeout(30)->post('https://portal.zynx.co.uk/api/submit', $apiData);
            
            if ($response->successful()) {
                $responseData = $response->json();
                
                if ($responseData['Status'] === 'processing') {
                    // Start polling for status
                    return $this->pollStatus($responseData['CheckStatusUrl'], $responseData['LeadID']);
                } else {
                    return $this->handleFinalResponse($responseData);
                }
            } else {
                Log::error('API submission failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                
                return back()->withErrors(['api' => 'Failed to submit application. Please try again.']);
            }
        } catch (\Exception $e) {
            Log::error('API submission error', ['error' => $e->getMessage()]);
            
            return back()->withErrors(['api' => 'Network error. Please try again.']);
        }
    }

    private function pollStatus($checkStatusUrl, $leadId)
    {
        $maxAttempts = 20; // 1 minute max (20 * 3 seconds)
        $attempt = 0;

        while ($attempt < $maxAttempts) {
            try {
                $response = Http::timeout(10)->get($checkStatusUrl);
                
                if ($response->successful()) {
                    $statusData = $response->json();
                    
                    if ($statusData['Status'] !== 'processing') {
                        return $this->handleFinalResponse($statusData);
                    }
                }
                
                sleep(3); // Wait 3 seconds before next check
                $attempt++;
            } catch (\Exception $e) {
                Log::error('Status polling error', ['error' => $e->getMessage()]);
                break;
            }
        }

        // If we reach here, polling timed out
        return back()->withErrors(['api' => 'Application is being processed. You will be contacted shortly.']);
    }

    private function handleFinalResponse($responseData)
    {
        if ($responseData['Status'] === 'ACCEPTED') {
            // Redirect to lender
            return redirect($responseData['RedirectURL']);
        } else {
            // Application rejected
            return back()->withErrors(['application' => 'Unfortunately, we cannot approve your application at this time. Please try again later or contact our support team.']);
        }
    }
}
