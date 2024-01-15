# Print-Track
This project will allow users to sign up and have access to a CRUD table that they can add jobs to. It will contain the basic CRUD elements of Create, Read, Update and Delete.

The CRUD table will have the following headings.

(ID, Supplier, Customer, Reference, Invoice, Date In, Date Out, Archived)

Something like DataTables.net with search and filter functions, and pagination.

The default table will ONLY show data that is NOT archived (boolean data).

On the edit data window have the option to archive or unarchive data.

This will be a SAAS (software as a service) project so users will need to pay upon signup, using stripe or paypal.

As it is a SAAS it will need to have multi tenancy user logins/accounts without accessing each others data. 

There will need to be an Admin Dashboard to control user access, pause users, delete users, create guest accounts, change passwords, etc.


Pages to include:

Home Page - A signup/user login in the top right corner, the rest of the page will have information about the website (to be provided at a later date)

Projects - The main page with the CRUD table, only displaying unarchived jobs

Work Order - A table displaying all the jobs that are due in date order (ability to print this page)

Account - Any account profile information can go on this page.
