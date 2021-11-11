# Project Name: Simple Shop
## Project Summary: This project will create a simple e-commerce site for users. Administrators or store owners will be able to manage inventory and users will be able to manage their cart and place orders.
## Github Link: (Prod Branch of Project Folder)
## Project Board Link: 
## Website Link: (Heroku Prod of Project folder)
## Your Name: Vincente Prata

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
### End Line item / Feature Template
--> 
### Proposal Checklist and Evidence

- Milestone 1
    - [X] \10/30/2021 User will be able to register a new account
      - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/register.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/40
      - PR link #2 https://github.com/vincentprata/IT202-003/pull/42
    - Screenshots
      - Screenshot #1 Form with required fields filled in before clicking register
      ![image](https://user-images.githubusercontent.com/76709142/140622095-ce4f8090-baa2-4118-bef1-2d4f0f8364f4.png)
      - Screenshot #2 Successful registration
      ![image](https://user-images.githubusercontent.com/76709142/140622140-6a938de4-0206-4396-b944-df205db4e573.png)
      - Screenshot # 3 Users Table with id, email, hashed password, username, and timestamp
      ![image](https://user-images.githubusercontent.com/76709142/140622182-c633cd58-64f7-4faf-aa1b-687b7feeb29b.png)
      - Screenshot # 4 Email Validation
      ![image](https://user-images.githubusercontent.com/76709142/140623590-94523f54-bd77-4775-a89e-72440c037387.png)


    - Form Fields
      - [X] Username, email, password, confirm password (other fields optional)
      - [X] Email is required and must be validated
      - [X] Username is required
      - [X] Confirm password's match
    - Users Table
      - [X] Id, username, email, password (60 characters), created modified
    - Password must be hashed (plain text passwords will lose points)
    - Email should be unique
    - Username should be unique
    - System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form
      - [X] The only fields that may be cleared are the password fields
      
      
      
      
    

     - [X] \11/06/2021 User will be able to login to their account (given they enter the correct credentials)
       - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/login.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/44
      - PR link #2 https://github.com/vincentprata/IT202-003/pull/17
    - Screenshots
      - Screenshot #1 Fields before logging in
      ![image](https://user-images.githubusercontent.com/76709142/140627417-d66d889d-fe95-40de-ad2b-835f8054fbea.png)
      - Screenshot #2 Successful login
      ![image](https://user-images.githubusercontent.com/76709142/140627466-859978ea-0f97-41e1-954c-63870b10ad95.png)
      - Screenshot # 3 Error message if account doesn't exist
      ![image](https://user-images.githubusercontent.com/76709142/140627658-3dadbb11-75dc-4c66-b57b-7a8931f1ee8b.png)
      - Screenshot # 4 Error message if passwords don't match
      ![image](https://user-images.githubusercontent.com/76709142/140627678-023875d8-8574-4cc3-b76e-3eaf4a0011d5.png)
      - Screenshot # 5 Landing page
      ![image](https://user-images.githubusercontent.com/76709142/140627825-e93686f6-36bf-40f2-a075-678f7140bf46.png)
        - Form
          - [X] User can login with email or username
            - This can be done as a single field or as two separate fields
          - [X] Password is required
        - User should see friendly error messages when an account either doesn't exist or if passwords don't match
        - Logging in should fetch the user's details (and roles) and save them into the session
        - User will be directed to a landing page upon login
          - [X] This is a protected page (non-logged in users shouldn't have access)
          - [X] This can be home, profile, a dashboard, etc


     - [X] \11/06/2021 User will be able to logout
       - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/login.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/17
    - Screenshots
      - Screenshot #1 Home screen before logout
      ![image](https://user-images.githubusercontent.com/76709142/140627825-e93686f6-36bf-40f2-a075-678f7140bf46.png)
      - Screenshot #2 Successful logout 
      ![image](https://user-images.githubusercontent.com/76709142/140627842-3c2f301f-3193-4afa-a9fa-f9ee2cd0009d.png)
      - Screenshot # 3 Session destroyed
      ![image](https://user-images.githubusercontent.com/76709142/140627856-9d91d2a1-ba0f-482e-8e94-cba891b26d71.png)
      - Logging out will redirect to login page
      - User should see a message that they've successfully logged out
      - Session should be destroyed (so the back button doesn't allow them access back in)


     - [X] \11/06/2021 Basic security rules implemented
       - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/login.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/32
    - Screenshots
      - Screenshot #1 Function to check if user is logged in
      ![image](https://user-images.githubusercontent.com/76709142/140628494-c5a62af4-7db5-4119-acb0-0491326c610f.png)
      - Screenshot #2 Have a roles table
      ![image](https://user-images.githubusercontent.com/76709142/140628522-391613f9-445e-4824-93e8-9f4dd8afbd64.png)
      - Authentication:
        - [X] Function to check if user is logged in
        - [X] Function should be called on appropriate pages that only allow logged in users
      - Roles/Authorization:
        - [X] Have a roles table (see below)


     - [X] \11/06/2021 Basic Roles implemented
       - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/login.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/32
    - Screenshots
      - Screenshot #1 Have a roles table
      ![image](https://user-images.githubusercontent.com/76709142/140628522-391613f9-445e-4824-93e8-9f4dd8afbd64.png)
      - Screenshot # 2 Have a User Roles table
      ![image](https://user-images.githubusercontent.com/76709142/140628672-b1778814-77ed-4cbc-9f79-f6610c88d3a4.png)
      - Screenshot # 3 Function to check if a user has a specific role
      ![image](https://user-images.githubusercontent.com/76709142/140628727-5c0b099c-3abc-4070-be02-40b1d173d875.png)
      - Have a Roles table (id, name, description, is_active, modified, created)
      - Have a User Roles table (id, user_id, role_id, is_active, created, modified)
      - Include a function to check if a user has a specific role (we won't use it for this milestone but it should be usable in the future)


    - [X] \11/06/2021 Site should have basic styles/theme applied; everything should be styled
       - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/register.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/42
    - Screenshots
      - Screenshot #1 Form with styling applied
      ![image](https://user-images.githubusercontent.com/76709142/140627090-79cec8b0-89f5-4451-a9a5-7feb23e5bad6.png)
      - I.e., forms/input, navigation bar, etc
 
    

     - [X] \11/06/2021 Any output messages should be "user friendly"
       - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/login.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/17
    - Screenshots
      - Screenshot #1 Error message if account doesn't exist
      ![image](https://user-images.githubusercontent.com/76709142/140627658-3dadbb11-75dc-4c66-b57b-7a8931f1ee8b.png)
      - Screenshot #2 Error messages if passwords don't match
      ![image](https://user-images.githubusercontent.com/76709142/140627678-023875d8-8574-4cc3-b76e-3eaf4a0011d5.png)
      - Any technical errors or debug output displayed will result in a loss of points

     - [X] \11/06/2021 User will be able to see their profile
       - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/register.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/40
    - Screenshots
      - Screenshot #1 User can see profile
      ![image](https://user-images.githubusercontent.com/76709142/140628097-a0b8b760-2ddf-4181-b9c1-897b7b02c685.png)
      - Email, username, etc

     - [X] \11/06/2021 User will be able to edit their profile
       - Status: Completed
    - Direct Link: https://vap6-prod.herokuapp.com/Project/register.php
    - Pull Requests
      - PR link #1 https://github.com/vincentprata/IT202-003/pull/40
    - Screenshots
      - Screenshot #1 Password reset successfully
      ![image](https://user-images.githubusercontent.com/76709142/140628203-91f46bf2-b598-40ef-af70-e8a77146b95b.png)
      - Screenshot #2 Checks if email is available
      ![image](https://user-images.githubusercontent.com/76709142/140628298-d1f80227-cb33-4337-8c12-60bd95fb28a2.png)
      - Changing username/email should properly check to see if it's available before allowing the change
      - Any other fields should be properly validated
      - Allow password reset (only if the existing correct password is provided)
        - [X] Hint: logic for the password check would be similar to login                  


- Milestone 2
- Milestone 3
- Milestone 4
### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone branch as the source)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board
