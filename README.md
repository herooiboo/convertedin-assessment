# convertedin assessment

- ** Laravel Installation (11:08 AM)**
- **Models & Migrations (11:15 AM)**
- **Some Model & Migration Adjustments (11:21 AM)**
- **Considerations (11:30 AM)**
Decided to use [Tabler](https://tabler.io) as the dashboard design.
- **Implementing (1:11 PM)**
    * Tabler Into Project
    * Preparation of layout e.g Header Footer master etc
    * Implemented Create Task Blade with Tom-select to search in users with preloads
    * Implemented User / Admin Search Endpoints with controllers, since they are identical tables i used seachable Trait into the controller
    * Implemented TinyMCE as text editor in create Task (available Domains are convertedin-assessment.test, localhost, 127.0.0.1)

- **Implementing Task Creation Functionality (2:22 PM)**
    - Implemented Create Task Interface to be blueprint for the creation class
        - Contains 2 Methods
            * First For creating Task
            * Second for Updating Statstics using event in background(queues)
    - Implemented Task Creation Service To have the 2 functions (second one is not implemented yet)
    - Implemented Form Request Validation to validate the Request.
    - Implemented the Tasks Service with Dependency Injecting The Create Task Serivce.
    - Implemented the Task Controller which will have 3 functions, index, store, create
        * Implemented the Create & Store Functions
    - Updated Routes so now we use Route::resource of our controller limited it only for the 3 functionality Index create store
    - Implemented Notyf Toaster to notify the user of errors and success
    - Implemented Helper file that include helper response file, which will Generate a response for success or failure scenarios.

- **Taking 20 Minutes Break**

- **Implementing Tasks Listing (3:31 PM)**
	- Installed laravelcollective/html
	- Implemented List Tasks Interface
	- Implemented Task List Service
	- Implemented Index in Controller
	- Implemented Search Scope in Tasks Model
	- Implemented Task List Resource And Collection
	- Implemented Tabler Pagination
	- Implemented Index Blade Table with Search and Pagination and Controlling how many records to show with 10 as the default.

- **Taking 1.5 Hour Lunch & Break**
- **Implementing Listing Top 10 User Statistics (6:15 PM)**
	* Implemented TaskCreated Event
	* Implemented UpdateUserStatistics Listener
	* Implemented ShowUserStatisticsInterface
	* Implemented UpdateUserStatisticsInterface
	* Implemented UserStatisticsController
	* Implemented UserStatistics Collection and Resource
	* Updated EventServiceProvider to implement UpdateUserStatistics listener on TaskCreated
	* Implemented ShowUserStatisticsService to listTop10TaskedUsers
	* Implemented UpdateUserStatisticsService which updates user stats
	* Implemented UserStatisticsService
	* Implemented topTaskedUsers blade
	* Implemented Route

- **Implementing Seeders And Factories & Updating Layout (6:35 PM)**
	- Implemented User & Admin Factory
	- Implemented User & Admin Seeders
	- Updated Database Seeder to have those 2 seeders called.
	- Updating Layout of Template.

- **Implementing 3 Unit Tests (7:30 PM)**
	-	 Implemented Unit Test for Task Creation
		  * Created a test case (TaskCreationTest) to ensure that tasks are created successfully when the admin submits the task creation form.
		  * Set up necessary data for the test, including an admin and user, and simulated the task creation request.
		  * Checked the response status, redirection, and the presence of the task in the database.

	- Implemented Unit Test for User Search
	  * Created a test case (UserSearchTest) to validate the user search functionality.
	  * Generated a user, made a request to the user search endpoint with the user's name using Laravel's testing features.
	  * Verified the response structure and confirmed that the expected user data is present in the response.

	- Implemented Unit Test for User Statistics
	  * Developed a test case (UserStatisticsTest) to confirm that the task counts in UserStatistic match the actual task counts in the Task model.
	  * Retrieved user statistics and calculated the total task count in both UserStatistic and the actual tasks.
	  * Checked that the task counts match and provided an assertion message in case of failure.

- ** Implemented Confirm the Test Run in GitHub Actions After Each Commit (7:40 PM)**

- ** One Command To Run System (8:00 PM)**

	* Actually, they are 2; if you updated your example.env, it will be one command only

```bash
php artisan install:env --dbname=converted_in2 --dbuser=root --dbpassword=
php artisan assessment:run
```
