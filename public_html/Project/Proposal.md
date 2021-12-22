# Project Name: Simple Shop
## Project Summary: This project will create a simple e-commerce site for users. Administrators or store owners will be able to manage inventory and users will be able to manage their cart and place orders.
## Github Link: (Prod Branch of Project Folder)
## Demo Video Link: https://mediaspace.njit.edu/media/Shop%20Project/1_n8zcugvt
## Project Board Link: 
## Website Link: https://vap6-prod.herokuapp.com/Project/shop.php
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
- Milestone 2
  <table><tr><td>Milestone 2</td></tr><tr><td><table><tr><td>F1 - User with an admin role or shop owner role will be able to add products to inventory (2021-11-27)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/home.php](https://vap6-prod.herokuapp.com/Project/home.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/72](https://github.com/vincentprata/IT202-003/pull/72)</p></td></tr><tr><td><table><tr><td>F1 - Table should be called Products (id, name, description, category, stock, created, modified, unit_price, visibility [true, false])<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144695787-be410df2-c559-4eab-9334-99ac48ebae57.png"><p>
User with admin role has authority to add items to shop inventory</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144695841-80360f37-ff13-4b27-b288-941363df9718.png"><p>Form before adding item to shop inventory</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144695885-9733545a-89ff-40d7-9129-8fbb86a47832.png"><p>
Item successfully added to Products sql table</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696120-b1ea85ff-d499-44d7-80f5-40c7fd710738.png"><p>
Products sql table</td></tr></td></tr></table></td></tr><table><tr><td>F2 - Any user will be able to see products with visibility = true on the Shop page (2021-12-01)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/shop.php](https://vap6-prod.herokuapp.com/Project/shop.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/74](https://github.com/vincentprata/IT202-003/pull/74)</p></td></tr><tr><td><table><tr><td>F2 - Product list page will be public (i.e. doesn’t require login)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696352-45ac77ba-52b8-4576-ae1d-4dbf0745efbb.png"><p>
Don't have to be logged in to see shop</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696413-f5087b5e-83b3-49ab-be2c-bf46f038b8bd.png"><p>Only items with tinyint value of 1 have visibility set to true.</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696434-490f3a9b-ee40-4b66-95a3-e02c667de26c.png"><p>Visibility for hammer was set to false and therefore cannot be seen by user on shop</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F2 - User will be able to filter results by category<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696556-863f9d9c-d264-43ef-9e38-a5eb2ca136f0.png"><p>Can filter results by category</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696582-e8dc0b67-a0df-4213-b992-c339da222b16.png"><p>Can filter by partial matches on name</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F2 - User will be able to sort results by price<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696636-f35f10c8-5462-4493-b70d-2428ad98db84.png"><p>
Results sorted by price</td></tr></td></tr></table></td></tr><table><tr><td>F3 - Admin/Shop owner will be able to see products with any visibility (2021-12-01)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/admin/list_items.php](https://vap6-prod.herokuapp.com/Project/admin/list_items.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/74](https://github.com/vincentprata/IT202-003/pull/74)</p></td></tr><tr><td><table><tr><td>F3 - This should be a separate page from Shop, but will be similar<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696702-59b1a5cc-9673-4af5-a338-da71bb5c6852.png"><p>Can see item with any visibility from admin page </td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F3 - This page should only be accessible to the appropriate role(s)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696729-c5ce690f-11a6-4cde-b73b-88aed6eafc54.png"><p>Must have admin role to see items with any visibility</td></tr></td></tr></table></td></tr><table><tr><td>F4 - Admin/Shop owner will be able to edit any product (2021-12-01)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/admin/edit_item.php?id=1](https://vap6-prod.herokuapp.com/Project/admin/edit_item.php?id=1)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/73](https://github.com/vincentprata/IT202-003/pull/73)</p></td></tr><tr><td><table><tr><td>F4 - Edit button should be accessible for the appropriate role(s) anywhere a product is shown (Shop list, Product Details Page, etc)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696811-3e7faeac-b185-4213-8bc5-80ec9ec0f7f1.png"><p>
Edit button so admin can edit items</td></tr></td></tr></table></td></tr><table><tr><td>F5 - User will be able to click an item from a list and view a full page with more info about the item (Product Details Page) (2021-12-01)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/cart.php](https://vap6-prod.herokuapp.com/Project/cart.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/74](https://github.com/vincentprata/IT202-003/pull/74)</p></td></tr><tr><td><table><tr><td>F5 - Product Details Page<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696916-92548743-46bc-415a-a213-9c1b5e6e9108.png"><p>Product details button from cart</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144696928-f598a140-459d-4cd8-9f42-68628d459586.png"><p>Product details page</td></tr></td></tr></table></td></tr><table><tr><td>F6 - User must be logged in for any Cart related activity below (2021-12-01)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/cart.php](https://vap6-prod.herokuapp.com/Project/cart.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/74](https://github.com/vincentprata/IT202-003/pull/74)</p></td></tr><tr><td><table><tr><td>F6 - Logged in to view cart<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697014-faac201b-00e0-4752-a5df-869f291d9c79.png"><p>Error message that item can't be added to cart since user is not logged in</td></tr></td></tr></table></td></tr><table><tr><td>F7 - User will be able to add items to Cart (2021-12-01)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/shop.php](https://vap6-prod.herokuapp.com/Project/shop.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/74](https://github.com/vincentprata/IT202-003/pull/74)</p></td></tr><tr><td><table><tr><td>F7 - Cart will be table-based (id, product_id, user_id, desired_quantity, unit_cost, created, modified)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697106-72c34b6d-ffe6-4565-ba8d-377ea37088cb.png"><p>Can add items to cart</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697130-949c7c54-6887-40c9-992a-3fea79f5c235.png"><p>
sql cart table</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F7 - Adding items to Cart will not affect the Product's quantity in the Products table<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697167-c0a76e0c-0935-491f-99c7-73e238ff95b8.png"><p>
Stock still the same in products table</td></tr></td></tr></table></td></tr><table><tr><td>F8 - User will be able to see their cart (2021-12-01)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/cart.php](https://vap6-prod.herokuapp.com/Project/cart.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/73](https://github.com/vincentprata/IT202-003/pull/73)</p></td></tr><tr><td><table><tr><td>F8 - List all the items<tr><td>Status: pending</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697226-22d0bf0c-e166-4427-9833-f645edaf0c5f.png"><p>Cart with items listed</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F8 - Will be able to click an item to see more details (Product Details Page)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697250-4b07b093-14ce-48e8-973f-5096d01ada08.png"><p>Can view product details page from cart</td></tr></td></tr></table></td></tr><table><tr><td>F9 - User will be able to change quantity of items in their cart (2021-12-01)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/cart.php](https://vap6-prod.herokuapp.com/Project/cart.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/73](https://github.com/vincentprata/IT202-003/pull/73)</p></td></tr><tr><td><table><tr><td>F9 - Quantity of 0 should also remove from cart<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697327-fd39a524-99de-4d51-a8a2-7f8d603980af.png"><p>Going to set item to 0 quantity</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697406-bccbf23c-cf44-47a8-86f4-8561c6cd4a16.png"><p>Item is removed after changing quantity to zero</td></tr></td></tr></table></td></tr><table><tr><td>F10 - User will be able to remove a single item from their cart via button click (2021-12-02)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/cart.php](https://vap6-prod.herokuapp.com/Project/cart.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/73](https://github.com/vincentprata/IT202-003/pull/73)</p></td></tr><tr><td><table><tr><td>F10 - Can remove single item from cart<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697478-cfc12f41-80fe-4759-be49-64ed41d461a5.png"><p>Item in cart before clicking remove</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697496-1791fc14-dec3-4604-b0fc-72019f3913d2.png"><p>Item removed after clicking remove</td></tr></td></tr></table></td></tr><table><tr><td>F11 - User will be able to clear their entire cart via a button click (2021-12-02)</td></tr><tr><td>Status: complete</td></tr><tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/cart.php](https://vap6-prod.herokuapp.com/Project/cart.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/73](https://github.com/vincentprata/IT202-003/pull/73)</p></td></tr><tr><td><table><tr><td>F11 - Can clear entire cart with button click<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697543-23e1b765-c304-49cf-a551-2b2bd0f7948d.png"><p>Cart before being cleared</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/76709142/144697555-22c1b37e-9dfc-4591-8680-1313513493ba.png"><p>Cart after being cleared</td></tr></td></tr></table></td></tr></td></tr></table>
- Milestone 3
  
<table>
<tr><td>Milestone 3</td></tr><tr><td>
<table>
<tr><td>F1 - User will be able to purchase items in their Cart (2021-12-08)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/shop.php](https://vap6-prod.herokuapp.com/Project/shop.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/97](https://github.com/vincentprata/IT202-003/pull/97)</p></td></tr>
<tr><td>
<table>
<tr><td>F1 - Create an Orders table (id, user_id, created, total_price, address, payment_method)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145662908-17832b42-6b2c-4e27-bf2c-3e91cbc74c25.png">
<p>Orders table created</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F1 - Create an OrderItems table (id, order_id, product_id, quantity, unit_price)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145662957-e80652ea-8479-40e2-bbb8-cc2a015de57a.png">
<p>Order items table created</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F1 - Checkout Form</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145662983-513a83f9-14dc-4a50-94d2-16ea1523dca2.png">
<p>Checkout form</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F1 - User will be asked for their Address for shipping purposes</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145662983-513a83f9-14dc-4a50-94d2-16ea1523dca2.png">
<p>Asks for address</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F1 - Order process</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145663045-e73bfd6c-3c45-45b0-9bee-d0f691043cb6.png">
<p>Item that is going to be purchased</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145663108-7a2c8165-413c-48e0-994a-8046cfb5500d.png">
<p>Checkout form filled out</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145663153-c105b565-c83f-4609-9627-1d28b462057f.png">
<p>Purchase is added to Orders table</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145663175-71f2174d-0bb4-42c7-b05b-53e34612d5ed.png">
<p>Item is added to OrderItems table</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145663221-83db9c92-16ff-428c-b920-0625adb611ac.png">
<p>Products table stock is updated after purchase</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145663412-2714abce-0de6-4f00-82e7-5d17e77984a9.png">
<p>Order confirmation page</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F2 - Order Confirmation Page (2021-12-08)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/order_confirmation.php](https://vap6-prod.herokuapp.com/Project/order_confirmation.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/97](https://github.com/vincentprata/IT202-003/pull/97)</p></td></tr>
<tr><td>
<table>
<tr><td>F2 - Show the entire order details from the Order and OrderItems table (similar to cart)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145663412-2714abce-0de6-4f00-82e7-5d17e77984a9.png">
<p>Details from order and Thank You message</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F3 - User will be able to see their Purchase History (2021-12-10)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/purchase_history.php](https://vap6-prod.herokuapp.com/Project/purchase_history.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/101](https://github.com/vincentprata/IT202-003/pull/101)</p></td></tr>
<tr><td>
<table>
<tr><td>F3 - For now limit to 10 most recent orders</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145664112-73f4de1a-9ee0-4d07-ac03-da15e6e73ad8.png">
<p>User can see their orders</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F4 - Store Owner will be able to see all Purchase History (2021-12-10)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/admin/list_purchase_history.php](https://vap6-prod.herokuapp.com/Project/admin/list_purchase_history.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/101](https://github.com/vincentprata/IT202-003/pull/101)</p></td></tr>
<tr><td>
<table>
<tr><td>F4 - For now limit to 10 most recent orders</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/145664147-e7238742-6975-4366-b332-c6647f4de705.png">
<p>Admin can see purchase history
</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr></td></tr></table>
- Milestone 4

<table>
<tr><td>Milestone 4</td></tr><tr><td>
<table>
<tr><td>F1 - User can set their profile to be public or private (will need another column in Users table) (2021-12-18)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/profile.php](https://vap6-prod.herokuapp.com/Project/profile.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/106](https://github.com/vincentprata/IT202-003/pull/106)</p></td></tr>
<tr><td>
<table>
<tr><td>F1 - If public, hide email address from other users</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147024980-7bec3da7-2cc6-46b4-b059-ba65b000ca73.png">
<p>Email address hidden on public profile</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F2 - User will be able to rate a product they purchased (2021-12-21)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/product_details.php](https://vap6-prod.herokuapp.com/Project/product_details.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/111](https://github.com/vincentprata/IT202-003/pull/111)</p></td></tr>
<tr><td>
<table>
<tr><td>F2 - Create table called Ratings (id, product_id, user_id, rating, comment, created)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147025854-b82f8b88-da67-4c87-bf92-d2894e0e11c7.png">
<p>Ratings sql table</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F2 - 1-5 rating, text comment done on product details page</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147026028-f25d378a-480d-4db7-a451-edb53a610c88.png">
<p>Rating must be 1-5 with a comment on product details page</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F2 - Ratings and Rating Comments will be visible on the Product Details page (Show the latest 10 reviews and paginate anything beyond 10)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147026306-5b283acb-7585-44f1-b49b-3edb9f7d98b2.png">
<p>Can see ratings, comments with latest 10 reviews shown and anything beyond 10 is paginated</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F2 - Show the average rating on the Product Details Page</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147026539-2722d5d3-1b40-4d42-a3d3-c707da69ca17.png">
<p>Average rating shown</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F3 - User’s Purchase History Changes (2021-12-21)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/purchase_history.php](https://vap6-prod.herokuapp.com/Project/purchase_history.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/116](https://github.com/vincentprata/IT202-003/pull/116)</p></td></tr>
<tr><td>
<table>
<tr><td>F3 - Filter by date range</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147026951-60b02a4a-c0db-46be-8fc1-e8750a8236b3.png">
<p>Date range filter</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F3 - Filter by category</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147027034-5c62ed9e-bba7-4086-927c-1fb5c731a7c2.png">
<p>Category Filter</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F3 - Sort by total, date purchased, etc</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147027217-05b4e3d0-6557-4a5e-9a83-5728f3780a3b.png">
<p>
Sort by total, date purchased</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F3 - Add pagination (Any filter/sort applied must be followed during the pagination process)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147027349-365d7150-7f82-45e7-a6ad-8f3b3e9aa5b3.png">
<p>Pagination added</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F4 - Store Owner Purchase History Changes (2021-12-21)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/admin/list_purchase_history.php](https://vap6-prod.herokuapp.com/Project/admin/list_purchase_history.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/116](https://github.com/vincentprata/IT202-003/pull/116)</p></td></tr>
<tr><td>
<table>
<tr><td>F4 - Filter by Date Range, Category and Sort by Total, Date Purchased</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147027634-d49c4d33-2002-4ef1-ac73-a833a9afb7c1.png">
<p>Store owner filter by date rate, category and sort by total, date purchased</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - Add pagination (Any filter/sort applied must be followed during the pagination process)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147027869-bbb622a5-a1d3-450a-ac63-9b565af48970.png">
<p>Store owner pagination added</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - The result page should show the accurate total price of the combined search results (i.e., if just 3 records show each of $25, it should show $75 total for this view)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147027961-5d3d2c1d-f8d6-49fb-993e-109303f86c0e.png">
<p>Results page shows total price</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F5 - Add pagination to Shop Page (2021-12-18)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/shop.php?page=1](https://vap6-prod.herokuapp.com/Project/shop.php?page=1)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/106](https://github.com/vincentprata/IT202-003/pull/106)</p></td></tr>
<tr><td>
<table>
<tr><td>F5 -  And any other product lists not yet mentioned</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147028159-852fdb7e-2455-4342-bc70-2fa33a675d43.png">
<p>Shop page has pagination</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F6 - Store Owner will be able to see all products out of stock (2021-12-21)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/admin/list_items.php](https://vap6-prod.herokuapp.com/Project/admin/list_items.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/113](https://github.com/vincentprata/IT202-003/pull/113)</p></td></tr>
<tr><td>
<table>
<tr><td>F6 - This will be added as a filter to their product list page from Milestone 2</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147028544-b9b4ea27-1e5b-4223-81da-549f8853afd9.png">
<p>Filter to see out of stock items</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F6 - Pagination should account for this new filter</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147028628-565fe6ca-e251-47d1-ba3a-73b9dcbf4712.png">
<p>Pagination applied</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147028760-5d6b81ca-06b9-432c-8300-08e7dca62ac8.png">
<p>Out of stock items shown</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F7 - User can sort products by average rating on the Shop Page (2021-12-21)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://vap6-prod.herokuapp.com/Project/shop.php](https://vap6-prod.herokuapp.com/Project/shop.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/vincentprata/IT202-003/pull/115](https://github.com/vincentprata/IT202-003/pull/115)</p></td></tr>
<tr><td>
<table>
<tr><td>F7 - Hint: may want to add an “average rating” field to the Products table and update this value any time a new rating is given for the product</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/76709142/147029304-ecd0c8a1-17c1-49e0-8dff-32b623d734da.png">
<p>Can sort products by average rating on shop page</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr></td></tr></table>
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
