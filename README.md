# myLoans Laravel Application

This Laravel application provides a complete loan application system with API integration to the Zynx UK platform.

## Features

- Multi-step loan application form
- API integration with Zynx UK platform
- Real-time status polling
- Responsive design matching the original HTML/CSS
- Form validation and error handling
- Blade templating system

## Setup Instructions

1. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Environment Configuration**
   Copy `.env.example` to `.env` and update the following values:
   ```
   APP_NAME=myLoans
   APP_URL=http://localhost:8000
   
   # API Configuration
   AFFILIATE_ID=myloans001
   OFFER_ID=12345
   ```

3. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

4. **Run Migrations**
   ```bash
   php artisan migrate
   ```

5. **Start the Development Server**
   ```bash
   php artisan serve
   ```

## API Integration

The application integrates with the Zynx UK API using the following endpoint:
- **Submit URL**: `https://portal.zynx.co.uk/api/submit`
- **Status Check**: Polls the provided CheckStatusUrl every 3 seconds

### Required API Parameters

The form collects all required parameters as specified in the API documentation:
- Personal details (name, DOB, contact info)
- Address information
- Employment details
- Income and expenses
- Bank account information
- Marketing preferences

### Response Handling

- **Processing**: Polls status URL every 3 seconds
- **Accepted**: Redirects to lender URL
- **Rejected**: Shows rejection message

## Form Structure

The application uses a 9-step form process:

1. **Loan Details** - Amount, term, purpose
2. **Personal Details** - Name, DOB, contact info
3. **Address Details** - Current address information
4. **Employment Details** - Work information
5. **Income Details** - Salary and benefits
6. **Expenses** - Monthly outgoings
7. **Bank Details** - Account information
8. **Marketing Preferences** - Communication preferences
9. **Terms & Conditions** - Legal acceptance

## File Structure

```
laravel-app/
├── app/Http/Controllers/
│   └── LoanApplicationController.php
├── resources/views/
│   ├── apply.blade.php (Main application form)
│   ├── index.blade.php
│   ├── about.blade.php
│   ├── contact.blade.php
│   ├── terms.blade.php
│   └── privacy.blade.php
├── public/
│   ├── styles.css
│   └── script.js
└── routes/web.php
```

## Configuration

Update the API credentials in your `.env` file:
- `AFFILIATE_ID`: Your affiliate ID
- `OFFER_ID`: The campaign offer ID

## Testing

The application includes comprehensive form validation and error handling. Test the form by:

1. Filling out all required fields
2. Testing validation rules
3. Submitting the form to see API integration
4. Testing the multi-step navigation

## Production Deployment

For production deployment:

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Configure proper database settings
4. Set up SSL certificates
5. Configure web server (Apache/Nginx)
6. Set up proper logging and monitoring

## Support

For technical support or questions about the API integration, please refer to the Zynx UK API documentation or contact the development team.