PHP Exercise

# PHP Exercise (2 days maximum)

In this exercise you need to create a form with 4 input fields:

- Company Symbol
- Start Date (YYYY-mm-dd)
- End Date (YYYY-mm-dd)
- Email

When the user submits the form you must do the following:

**1)** Validate the form both on client and server side and place appropriate messages on both cases.
All fields must be mandatory. Include also validation for:

- formatting and logic of dates
- existence of company symbol
- formatting of email

**2)** Display on screen the historical quotes for the submitted company in the given date range in
table format (Date, Open, High, Low, Close and Volume values).
Company symbols can be found here:
[http://www.nasdaq.com/screening/companies-by-name.aspx](http://www.nasdaq.com/screening/companies-by-name.aspx)
(For download in excel format: [http://www.nasdaq.com/screening/companies-by-](http://www.nasdaq.com/screening/companies-by-)
name.aspx?&render=download)

Data should be retrieved by using the API:
https://finance.google.com/finance/historical?output=csv&q={symbol}&startdate={start_date}&e
nddate={end_date}
where:
{symbol} = value of the field Company Symbol
{start_date} = value of the field Start Date in the format M d, Y
{end_date} = value of the field End Date in the format M d, Y

**Examples**
https://finance.google.com/finance/historical?output=csv&q=GOOG&startdate=Nov%2002,%
01 7&enddate=Nov%2017,%
https://finance.google.com/finance/historical?output=csv&q=GOOG&startdate=Oct%2002,%
17&enddate=Nov%2017,%
As you can see in the above examples, the spaces in the dates are replaced with %20 (url
encoding).

**3)** Display a chart of the open and close prices in the given date range.


PHP Exercise - v17.0. 2 2

**4)** Send an email using the submitted company’s name as subject (i.e. Google) and the start date
and end date as body (i.e. "From 2016- 01 - 01 to 2016- 02 - 01").

## Notes

- The user must enter date using jQuery UI datepicker
    [http://jqueryui.com/datepicker/](http://jqueryui.com/datepicker/)
- You can develop the exercise using plain PHP, but PHP framework (Symfony, Laravel etc) is
    preferred.
- In case you will not use any PHP framework, the email must be send using the swift mailer
    https://github.com/swiftmailer/swiftmailer


