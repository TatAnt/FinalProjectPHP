-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 07:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(30) DEFAULT NULL,
  `CatImage` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `CategoryName`, `CatImage`) VALUES
(1, 'Salads', 'salads.jpg'),
(2, 'Chicken', 'chicken.jpg'),
(3, 'Rice', 'rice.jpg'),
(4, 'Savoury Breads', 'bagels.jpg'),
(5, 'Fruit', 'fruitCategory.jpg'),
(6, 'Pasta', 'pasta1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `UserId` int(11) NOT NULL,
  `RecipeId` int(11) NOT NULL,
  `Comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mealtypes`
--

CREATE TABLE `mealtypes` (
  `MealTypeId` int(11) NOT NULL,
  `MealTypeName` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mealtypes`
--

INSERT INTO `mealtypes` (`MealTypeId`, `MealTypeName`) VALUES
(1, 'MainDish'),
(2, 'Appetizers'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `UserId` int(11) NOT NULL,
  `RecipeId` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`UserId`, `RecipeId`, `Rating`, `Comment`) VALUES
(10, 1, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `RecipeDate` date DEFAULT NULL,
  `Ingridients` text NOT NULL,
  `PreparationTime` varchar(20) DEFAULT NULL,
  `CookingTime` varchar(20) DEFAULT NULL,
  `Servings` int(11) DEFAULT NULL,
  `PrepSteps` text DEFAULT NULL,
  `CategoryId` int(11) NOT NULL,
  `MealTypeId` int(11) NOT NULL,
  `Image` varchar(20) DEFAULT NULL,
  `Comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`Id`, `Name`, `RecipeDate`, `Ingridients`, `PreparationTime`, `CookingTime`, `Servings`, `PrepSteps`, `CategoryId`, `MealTypeId`, `Image`, `Comment`) VALUES
(1, 'Orange Salad with Carrots and Fennel', '2020-12-01', '<p>1 small fennel</p>\r\n\r\n<p>1 carrot</p>\r\n\r\n<p>2 radishes</p>\r\n\r\n<p>1/4 cup (60 ml) white wine vinegar</p>\r\n\r\n<p>1/4 cup (60 ml) olive oil</p>\r\n\r\n<p>4 oranges, peels and pith removed</p>', '30 min', '20 min', 4, '<p><b>1.</b> Using a mandoline, thinly slice the fennel bulb. Reserve the fronds. Slice the carrot and radishes into very thin rounds.</p>\r\n\r\n<p><b>2.</b> Plunge the sliced fennel, carrot and radishes into a bowl of ice water.</p>\r\n<p><b>3.</b> Add 2 tbsp (30 ml) of the vinegar. Let soak for 10 minutes or until crisp and starting to curl. Drain and pat dry with paper towel.</p>\r\n<p><b>4.</b> In a bowl, combine the oil and remaining vinegar. Season with salt and pepper.</p>\r\n<p><b>5.</b> Slice the oranges into rounds and arrange on plates. Top with the crisp vegetables and garnish with fennel fronds. Drizzle with the dressing and serve.</p>', 1, 2, 'fruitSalad.jpg', NULL),
(2, 'Sesame Bagels', '2020-12-02', '\r\n<p>3 1/2 cups (525 g) unbleached all-purpose flour</p>\r\n\r\n<p>1 tbsp instant dry yeast</p>\r\n\r\n<p>1 1/2 tsp salt</p>\r\n\r\n<p>1 1/4 cups (310 ml) warm water</p>\r\n\r\n<p>1/2 cup (125 ml) honey</p>\r\n\r\n<p>3 tbsp (45 ml) vegetable oil</p>\r\n\r\n<p>1/4 cup (35 g) sesame seeds</p>', '30 min', '55 min', 12, '<p><b>1.</b> In a stand mixer fitted with the dough hook, or in a large bowl using a wooden spoon, combine the flour, yeast and salt. Add the water, half of the honey (1/4 cup/60 ml) and the oil. Stir until a soft ball forms. Knead on a lightly floured surface or in the stand mixer for 5 minutes or until smooth.</p>\r\n<p><b>2.</b> Shape the dough into a ball and place in a lightly oiled bowl, turning to coat with the oil. Cover with a damp cloth and let rise in a warm, humid place for 30 minutes.</p>\r\n<p><b>3.</b> On a work surface, shape the dough into a log and cut into 12 equal pieces. Roll each piece into a 9-inch (23 cm) rope. To join the two ends together, slightly overlap them, then roll the seam back and forth using the palm of your hand. Set aside on a lightly floured surface and cover with plastic wrap. Let rise for 15 minutes.\r\nWith the rack in the lowest position, preheat the oven to 450°F (230°C). Line two baking sheets with silicone mats or parchment paper. Sprinkle each sheet with 1 tbsp of sesame seeds.</p>\r\n<p><b>4.</b> Meanwhile, in a large pot, bring 12 cups (3 litres) of water and the remaining honey to a boil. Poach 3 to 4 bagels at a time for 3 minutes or until slightly puffed, turning halfway through cooking. Remove with a slotted spoon and place on the prepared sheets. Sprinkle with the remaining sesame seeds.</p>\r\n<p><b>5.</b> Bake one sheet at a time for 20 minutes or until the bagel are golden brown. Let cool for 15 minutes. Enjoy with homemade cream cheese (see recipe).</p>', 4, 2, 'bagels.jpg', NULL),
(3, 'Almond Snowball Cookies', '2020-12-07', '\r\n<p> 1 1/2 cups (200 g) ground almonds</p>\r\n\r\n<p> 1 cup (140 g) unbleached all-purpose flour</p>\r\n\r\n<p> 1/2 cup (85 g) roasted almonds, finely chopped</p>\r\n\r\n<p> 1 cup (227 g) unsalted butter, softened</p>\r\n\r\n<p> 2 cups (270 g) icing sugar</p>', '40 min', '15 min', 4, '<p><b>1.</b> With the rack in the middle position, preheat the oven to 350°F (180°C). Line two baking sheets with parchment paper.</p>\r\n<p><b>2.</b> In a bowl, combine the ground almonds, flour and chopped almonds. Set aside.</p>\r\n<p><b>3.</b> In another bowl, cream the butter and 1/2 cup of the icing sugar with an electric mixer. Stir in the ground almond mixture at low speed or with a wooden spoon.</p>\r\n<p><b>4.</b> With a 1-tbsp ice cream scoop or measuring spoon, portion the dough into balls. Finish shaping by rolling them between your hands. Place the cookies on the prepared baking sheets.</p>\r\n<p><b>5.</b> Bake, one sheet at a time, for about 15 minutes or until golden brown. Let cool for 5 minutes.</p>\r\n<p><b>6.</b> Roll the warm cookies in the remaining icing sugar (1 1/2 cups). Return to the baking sheets and let cool completely. Roll the completely cooled cookies a second time in the icing sugar.</p>\r\n<p><b>7.</b> These cookies will keep for about three weeks in an airtight container in a cool, dry place or can be frozen.</p>', 5, 3, 'almondballs.jpg', NULL),
(4, 'Oven-Baked Apples', '2020-12-08', '<p> 6 Royal Gala apples, peeled, cored and halved</p>\r\n\r\n<p> 1 cup (210 g) sugar</p>\r\n\r\n<p> 3 tbsp (45 ml) water</p>\r\n\r\n<p> 2 cups (500 ml) Greek yogurt, flavour of your choice (coconut, vanilla, etc.)</p>\r\n\r\n<p> 2 cups (270 g) fresh raspberries</p>\r\n\r\n<p> 1/2 cup (85 g) pomegranate seeds</p>\r\n\r\n<p> 1 cup (115 g) coconut granola (see recipe)</p>', '15 min', '50 min', 6, '<p><b>1.</b> With the rack in the middle position, preheat the oven to 375°F (190°C). In a large baking dish, arrange the apples cut-side up. Set aside.</p>\r\n\r\n<p><b>2.</b> In a small pot, bring the sugar and water to a boil. Cook until an amber caramel forms. Pour over the apples. Cover with foil.</p>\r\n<p><b>3.</b> Bake for 40 minutes or until the apples are tender. Let cool, then flip the apples over. Cover and refrigerate for 2 hours or until completely chilled.</p>\r\n<p><b>4.</b> Serve with the yogurt, raspberries, pomegranate seeds and granola. Drizzle with a spoonful of caramel.</p>', 5, 3, 'bakedApple.jpg', NULL),
(5, 'Tomato and Green Bean Salad with Haddock Poached in White Wine', '2020-09-14', '<p> ½ lb (225 g) fresh haddock fillets</p>\r\n\r\n<p> ¼ cup (60 ml) white wine</p>\r\n\r\n<p> ½ lb (225 g) green beans, trimmed</p>\r\n\r\n<p> 2 cups (350 g) multi-coloured cherry tomatoes, halved</p>\r\n\r\n<p> 2 tbsp (30 ml) chopped cilantro</p>\r\n\r\n<p> 2 tbsp (30 ml) chopped chives</p>\r\n\r\n<p> 2 tbsp (30 ml) lemon juice</p>\r\n\r\n<p> 1 tbsp (15 ml) olive oil</p>\r\n\r\n<p> 2 hard-boiled eggs, halved</p>\r\n\r\n<p> Salt and pepper</p>', '30', '15', 4, '<p><b>1.</b> In a non-stick skillet, place the haddock and white wine. Cover and bring to a boil. Simmer for about 4 minutes or until the fish is cooked and flakes easily.</p>\r\n<p><b>2.</b> In a saucepan of salted boiling water, boil the green beans until tender. Cool in ice water and drain. Split the beans in half lengthwise if desired.</p>\r\n<p><b>3.</b> In a bowl, combine the green beans, tomatoes, herbs, lemon juice and olive oil. Season with salt and pepper. Divide among 4 plates. Top with large chunks of fish and half a hard-boiled egg.</p>', 1, 2, 'greensalad.jpg', NULL),
(6, 'Spaghetti with Pecorino and Fresh Tomatoes', '2020-08-17', '<p> 3 ripe tomatoes</p>\r\n\r\n<p> 2 cups (100 g) fresh bread, cubed</p>\r\n\r\n<p> 1 garlic clove, chopped</p>\r\n\r\n<p> ¼ cup (60 ml) olive oil</p>\r\n\r\n<p> 1 lb (450 g) spaghetti</p>\r\n\r\n<p> 1 cup (70 g) Pecorino cheese, freshly grated, plus more for serving</p>\r\n\r\n<p> 2 egg yolks</p>\r\n\r\n<p> ½ tsp dried oregano</p>\r\n\r\n<p> ¼ tsp red pepper flakes</p>\r\n\r\n<p> ¼ cup (10 g) basil leaves</p>', '20 min', '15 min', 6, '<p><b>1.</b> On a work surface, dice 1 of the tomatoes. Set aside in a bowl. Grate the remaining tomatoes into a large bowl. Compost any skin that does not get grated.</p>\r\n<p><b>2.</b> In a small food processor, pulse the bread until the texture of fine breadcrumbs.</p>\r\n<p><b>3.</b> In a skillet over medium-high heat, brown the garlic in half of the oil for a few seconds. Add the bread and cook for 5 minutes or until golden. Season with salt and pepper. Let cool.</p>\r\n<p><b>4.</b> Meanwhile, in a large pot of salted boiling water, cook the pasta until al dente. Reserve ½ cup (125 ml) of the cooking water. Drain the pasta.<p>\r\n<p><b>5.</b> Add the cheese, egg yolks, oregano and red pepper flakes to the bowl of grated tomatoes. Season with salt and pepper. Whisk in the hot pasta cooking water.</p>\r\n<p><b>6.</b> Off the heat, return the pasta to the pot. Add the Pecorino sauce, diced tomato and remaining oil. Toss to coat the pasta in the sauce. Cook over low heat to thicken the sauce, if necessary.\r\n<p><b>7.</b> Serve the pasta in shallow bowls. Garnish with the garlic breadcrumbs, basil and Pecorino.</p>', 6, 1, 'pasta1.jpg', NULL),
(7, 'Burrito Bowl', '2020-12-01', '<p> 1 ¼ cups (190 g) unbleached all-purpose flour</p>\r\n\r\n<p> 2 tbsp sugar</p>\r\n\r\n<p> ¼ tsp salt</p>\r\n\r\n<p> ½ cup (115 g) unsalted butter, cubed and chilled</p>\r\n\r\n<p> ¼ cup (60 ml) plain yogurt</p>', '30 min', '25 min', 4, '<p><i>Rice</i></p>\r\n<p><b>1.</b> In a pot, bring the water and salt to a boil. Add the rice and stir with a wooden spoon. Reduce the heat to low. Cover and cook for 18 minutes. Let sit for 5 minutes. Fluff the rice with a fork.</p>\r\n<p><i>Meat</i></p>\r\n<p><b>2.</b> Meanwhile, in a non-stick skillet over medium-high heat, cook the meat in the oil along with the spices for 6 to 8 minutes or until golden, breaking the meat up with a wooden spoon.  Add the chili sauce and cook for 30 seconds while stirring. Keep warm.</p>\r\n<p><i>Corn Salad</i></p>\r\n<p><b>3.</b> In a bowl, combine all of the ingredients. Season with salt and pepper.</p>\r\n<p><b>4.</b> Divide the rice, meat and corn salad among four bowls. Garnish with the cheese, a piece of avocado (peel before serving) and a spoonful of sour cream. Drizzle with lime juice.</p>', 3, 1, 'burritto.jpg', NULL),
(8, 'Carrot and Shrimp Risotto', '2020-12-02', '<p>4 cups (1 litre) chicken broth</p>\r\n\r\n<p>1/2 tsp saffron (see note)</p>\r\n\r\n<p>4 carrots, cut into chunks</p>\r\n\r\n<p>1 onion, cut into chunks</p>\r\n\r\n<p>2 garlic cloves, peeled</p>\r\n\r\n<p>2 tbsp butter</p>\r\n\r\n<p>1 cup (210 g) arborio rice</p>\r\n\r\n<p>3/4 cup (180 ml) white wine</p>\r\n\r\n<p>1 cup (70 g) Parmesan cheese, freshly grated</p>', '25 min', '35 min', 4, '<p><i>Risotto</i></p>\r\n<p><b>1.</b> In a pot, bring the broth to a boil. Add the saffron and keep warm.</p>\r\n<p><b>2.</b> Meanwhile, in a food processor, finely chop the carrots, onion and garlic.</p>\r\n<p><b>3.</b> In a large pot over medium-high heat, soften the vegetables in the butter. Add the rice and cook for 1 minute, stirring to coat in the butter. Add the wine and let reduce until almost dry.</p>\r\n<p><b>4.</b> Over medium heat, add the broth, about 250 ml (1 cup) at a time, stirring frequently until the liquid is completely absorbed before adding more broth. Season with salt and pepper. Cook 18 to 22 minutes or until the rice is al dente. Add more broth as needed.\r\nOff the heat, add the Parmesan and stir until creamy. Adjust the seasoning.</p>\r\n\r\n<p><i>Garnish</i></p>\r\n<p><b>5.</b> In a non-stick skillet over medium-high heat, soften the carrots in half of the butter. Add the lemon juice. Season with salt and pepper. Set aside on a plate.</p>\r\n<p><b>6.</b> In the same skillet over medium heat, cook the shrimp in the remaining butter without letting them brown. Season with salt and pepper.\r\nDivide the risotto among four bowls. Garnish with the carrots with lemon and the shrimp.</p>', 3, 1, 'risotto1.jpg', NULL),
(9, 'Honey and Ginger Roasted Peaches', '2020-12-14', '<p>1/3 cup (75 ml) honey</p>\r\n\r\n<p>1 lemon, sliced</p>\r\n\r\n<p>1 piece 3-inch (7.5-cm) fresh ginger, sliced</p>\r\n\r\n<p>8 peaches, halved and pitted</p>\r\n\r\n<p>Vanilla ice cream, to taste</p>\r\n\r\n<p>Store-bought biscotti, crushed, to taste</p>', '15 min', '25 min', 4, '<p><b>1.</b> In a large bowl using a wooden spoon, or in a stand mixer using the dough hook, combine the flour, sugar, yeast and salt. Add the water and combine until a soft ball forms. Knead the dough for 2 minutes on a lightly floured surface or in the stand mixer until smooth.<p>\r\n<p><b>2.</b> Gently spread the dough into a lightly oiled 9 x 13-inch (23 x 33 cm) rectangular baking dish. Cover with a damp cloth or plastic wrap and let rise in a warm, humid place for 30 minutes or until the dough has doubled in volume.<p>\r\n<p><b>3.</b> Pour the oil onto the dough. Gently spread the dough to the dimensions of the dish, turning to coat with the oil. Make small cavities using your fingertips. Let rise for 30 minutes.<p>\r\n<p><b>4.</b> With the rack in the middle position, preheat the oven to 400°F (200°C).<p>\r\n<p><b>5.</b> In a bowl, combine the herbs and garlic. Sprinkle over the dough. Generously season with fleur de sel and pepper.<p>\r\n<p><b>6.</b> Bake for 25 minutes or until golden brown. Let rest for 5 minutes before serving.<p>', 5, 3, 'peach.jpg', NULL),
(10, 'Focaccia with Fresh Herbs', '2020-12-14', '<p>2 cups (300 g) unbleached all-purpose flour</p>\r\n\r\n<p>1 1/2 tsp sugar</p>\r\n\r\n<p>1 tsp instant dry yeast</p>\r\n\r\n<p>1 tsp salt</p>\r\n\r\n<p>3/4 cup (180 ml) warm water</p>\r\n\r\n<p>1/4 cup (60 ml) olive oil</p>\r\n\r\n<p>2 tbsp chopped fresh herbs (such as thyme, rosemary, oregano)</p>\r\n\r\n<p>1 garlic clove, chopped</p>\r\n\r\n<p>Fleur de sel, to taste</p>', '25 min', '25 min', 6, '<p><b>1.</b> In a large bowl using a wooden spoon, or in a stand mixer using the dough hook, combine the flour, sugar, yeast and salt.</p>\r\n<p><b>2.</b> Add the water and combine until a soft ball forms. Knead the dough for 2 minutes on a lightly floured surface or in the stand mixer until smooth.</p>\r\n<p><b>3.</b> Gently spread the dough into a lightly oiled 9 x 13-inch (23 x 33 cm) rectangular baking dish. Cover with a damp cloth or plastic wrap and let rise in a warm, humid place for 30 minutes or until the dough has doubled in volume.</p>\r\n<p><b>4.</b> Pour the oil onto the dough. Gently spread the dough to the dimensions of the dish, turning to coat with the oil. Make small cavities using your fingertips. Let rise for 30 minutes.</p>\r\n<p><b>5.</b> With the rack in the middle position, preheat the oven to 400°F (200°C).</p>\r\n<p><b>6.</b> In a bowl, combine the herbs and garlic. Sprinkle over the dough. Generously season with fleur de sel and pepper.</p>\r\n<p><b>7.</b> Bake for 25 minutes or until golden brown. Let rest for 5 minutes before serving.</p>', 4, 2, 'focaccia.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Role_Id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Role_Id`, `Name`) VALUES
(1, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Salt` varchar(30) NOT NULL,
  `Role_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Username`, `Email`, `Password`, `Salt`, `Role_Id`) VALUES
(8, 'cook', 'cook@gmail.com', '$2y$10$e3e90fd6d2a7c4661a1a3OqRpVlLObGfbyCZwanK8R2aWHgkL7p9C', '$2y$10$e3e90fd6d2a7c4661a1a3a', 1),
(9, 'mary', 'mary@gmail.com', '$2y$10$b8e7be5dfa2ce0714d21dOstwN3g4do2lpAPiiXpfB7rIQKcnMSk6', '$2y$10$b8e7be5dfa2ce0714d21dc', 1),
(10, 'best', 'best@gmail.com', '$2y$10$db82206b1d49042d1a710e6Kma35j5FxzJt17U/Wkt0yJ1mW7c.DS', '$2y$10$db82206b1d49042d1a710e', 1),
(11, 'tasty', 'tasty@gmail.com', '$2y$10$eb0c28768b1cfe1c105a8OXLZnxHmRbxM3SXFB6SGs8J4yPL/9ob6', '$2y$10$eb0c28768b1cfe1c105a8c', 1),
(12, 'kate', 'kate@gmail.com', '$2y$10$29ddc288099264c17b07bOx56B1slSi4Z7P9s.4epbbKfL4zZ.Bb2', '$2y$10$29ddc288099264c17b07ba', 1),
(13, 'sam', 'sam@gmail.com', '$2y$10$332532dcfaa1cbf61e2a2uLQrcw.jiCCWV/FaozgIzENo1Sw5q4ES', '$2y$10$332532dcfaa1cbf61e2a26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `mealtypes`
--
ALTER TABLE `mealtypes`
  ADD PRIMARY KEY (`MealTypeId`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`UserId`,`RecipeId`),
  ADD KEY `RecipeId_FK` (`RecipeId`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Role_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `FK_Role_Id` (`Role_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mealtypes`
--
ALTER TABLE `mealtypes`
  MODIFY `MealTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Role_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `RecipeId_FK` FOREIGN KEY (`RecipeId`) REFERENCES `recipes` (`Id`),
  ADD CONSTRAINT `UserId_FK` FOREIGN KEY (`UserId`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Role_Id` FOREIGN KEY (`Role_Id`) REFERENCES `roles` (`Role_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
