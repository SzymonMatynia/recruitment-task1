PHP OOP / TDD
====================
Create a simple, object-oriented shopping cart mechanism with unit tests. For this you need to write Product, Cart and Item classes and the corresponding tests.

### Product
- Each product has its name and price.
- The product has a minimum number of items that can be ordered, by default this value is 1

### Cart
- You can add and remove a product to the cart
- When adding a product to the cart, we specify the number of items
- A single item in the cart is an Item that consists of the product and the number of items
- After adding the same product to the cart again, only its quantity is increased
- The basket should have a method that returns the total value of the order

### Item
- It should consist of the product and the number of pieces
- The product that is part of this object should be immutable
- It should allow you to change the number of pieces
- If a smaller quantity is selected than the minimum value that is defined for the product, an exception should be thrown.


Make sure PSR-2 compliant formatting will be accepted by PHP Code Sniffer. Cart should operate on pennies to avoid floating point errors.git The composer.json file contains the necessary dependencies and configured PSR-4 autoloading.

To simplify the task, don't worry about storing the basket in the session or in the database. You don't need to write controllers or views. The task is only to execute the model and unit tests.
