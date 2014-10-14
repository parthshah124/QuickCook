create schema sen;
use sen;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sen`
--

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
  `Dish_id` int(11) NOT NULL,
  `Dname` varchar(30) NOT NULL,
  `recipe` varchar(2500) NOT NULL,
  `difficulty_level` int(11) NOT NULL,
  `cuisine` varchar(15) NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `total_calorie` double NOT NULL,
  `avg_rating` float DEFAULT NULL,
  `Number_Of_Users_rated_it` int(11) DEFAULT NULL,
  PRIMARY KEY (`Dish_id`),
  UNIQUE KEY `Dname` (`Dname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`Dish_id`, `Dname`, `recipe`, `difficulty_level`, `cuisine`, `preparation_time`, `total_calorie`, `avg_rating`, `Number_Of_Users_rated_it`) VALUES
(1, 'Batata Poha', 'In a shallow dish put oil, curry leaves, onion, chillies and ginger and microwave covered for 2 minutes. Stir in turmeric, salt and sugar and microwave for 30 seconds.\r\nMix in potatoes, peas and water and microwave for 3 minutes. Stir in the rest of the ingredients and microwave for 2 minutes. Garnish with coriander leaves and grated coconut.', 2, 'Indian', 10, 198, 0, 0),
(2, 'Gobhi Aloo Paratha', 'Combine flours and salt in a medium bowl. Add water slowly and nead soft dough. Cover and Let the dough rest on the counter for 15-20minutes. \r\nFor filling:  Heat 1 tbsp of oil in a pan. Temper with cumin seeds, when cumin seeds done, add asafetida (hingh) and turmeric powder. \r\nAdd ginger, green chili and finely chopped onion. Suate about 1/2 min or so. Cook on medium heat. \r\nAdd cualiflower and again let it cook. Add salt, coriander powder, mint, aamchoor powder, sugar. \r\nAdd boiled mashed potato or ready mashed potato, sprinkle cilantro (fresh dhaniya). Mix everything well. Let mixture cool down. \r\nWhen mixture is warm or cool, make lemon sized ball and keep aside. \r\nFor making parathas: \r\nMake balls bigger than lemon size (dough ball should be bigger than filling ball)of dough. \r\nRoll it like chappati or puri with the help of little dusting(any flour such as wheat, plain, rice flour can be used for dusting) about 3 inches diameter, put filling(prepared balls of mixture-filling) on it and fold it towards center till the edges meet. Seal the edges by pressing the chappati. \r\nNow again roll it like chapati (around 8 inches in diameter-depend how big/small you prefer). \r\nRepeat the process for all parathas. \r\nPre heat tava on high flame. \r\nApply some oil on tava and put aloo/gobi paratha. \r\nCook it both the side with oil at med-high flame. \r\nBefore serving put some butter on it if you baked parathas without oil. \r\nServe it hot with raita, pickle or green chutney and tea.', 3, 'Punjabi', 15, 219, 0, 0),
(3, 'Upma', '\r\nBoil the green peas in 1 1/4 cup of water. \r\nAs water comes to boil turn heat to low and continue cooking until peas are tender. \r\nTurn off the heat and set aside. \r\nHeat the oil in a saucepan. Test the heat by adding one cumin seed to the oil; if it cracks right away oil is ready. Add black mustard seed and cumin seed. \r\nAdd mustard seed and cumin seeds as seeds crack add peanuts and stir for one minute. \r\nAdd sooji and stir-fry about 3 minutes on medium heat till sooji turns gold brown. \r\nAdd green peas with water a little at a time, otherwise water will splatter. \r\nAdd lemon juice and cover for 2 minutes. \r\nSooji will absorb some of the water leaving the upma moist. \r\nNow add the cilantro and stir. Serve while hot.', 3, 'South Indian', 15, 150, 0, 0),
(4, 'Rava Dosa', 'rava dosa is easy to make especially if you make it by the method shown here and\r\nis a very tasty kind of dosa. The steps shown in making rava dosa are as follows: \r\na. MAKING the batter, take two measures of any old batter (of dosa or idli) add to it \r\nsix or seven measures of fine rava and one teaspoon of salt and some kothmir( hara dhaniya/ cilantro ).\r\n mix six to seven 200 ml glasses of plain water and keep for half an hour.\r\nMAKING THE TADKA: Heat about 2 or 3 table spoons of oil, fry mustard, jeera, finely cut ginger, chillies\r\nand karepak ( curry leaves ) and add to the batter \r\nMAKING THE DOSA: Take about 100 ml ( one cup ) of the batter after thorough mixing\r\n and pour it into a very hot non stick griddle ( tava ). The batter should be so\r\n diluted that when poured into the griddle will spread itself uniformly. Pour oil \r\naround the edges of the dosa and wait till it turns brown and releases itself from the\r\nedges on its own, then flip over and wait till the hissing / crackling sound becomes less', 3, 'South Indian', 8, 87.5, 0, 0),
(5, 'Bread Omlet', 'Beat the eggs properly. Now add red chilli powder, turmeric powder and salt to it. And mix it very good.\r\n There should not be any lump of dry spices.\r\nPut the pan on medium heat. Meanwhile toast the bread slices using toaster.\r\n If you don''t have toaster then you can toast the bread slices on pan only with using some butter.\r\nPut 1 tsp oil in the same pan. Once the oil is hot pour the egg mixture in a pan to prepare omelet.\r\n Let it cook for a minute. Now deep bread slices in a egg mixture and keep it aside.\r\nLet it cook for another 2 minutes. Now put bread slices over the omelet. Put plane side of bread over omelet.\r\nNow flip the omelet carefully by holding both the bread slices with tips of your finger.\r\nCook it for 2 minutes from other side. Fold it\r\nDelicious Cheese Bread Omelet is ready to eat.', 3, 'Indian(Non-Veg)', 10, 581, 0, 0),
(6, 'Egg Sandwich', 'Beat 2 eggs, add salt and pepper.  Put some butter in a skillet, add the scrambled egg. \r\n Apply butter on bread toast and lay slices of tomatoes. Flip over the egg and add some cheese. Fold the egg and its ready to go into the sandwich. ', 3, 'Indian(Non-Veg)', 15, 212, 0, 0),
(7, 'Sabudana Khichdi', 'Gently wash then soak tapioca (sabudana) in about 1/2 cup of water for 6 to 8 hours. \r\nRoast the peanuts on medium heat, until they are lightly brown. Keep aside. \r\nHeat the oil in a frying pan on medium heat. Test the heat by adding one cumin seed to the oil; if seed cracks right away then oil is ready. \r\nAdd cumin seeds and mustard seeds after seeds crack add green chilies and stir for a few seconds. \r\nNext add the green peas and stir fry until peas are tender. \r\nAdd the soaked tapioca (sabudana) and stir fry for 3 to 4 minutes , \r\nAdd turmeric, and salt and stir fry on medium heat continuously until tapioca (sabudana) becomes translucence, looks like pearls. Stir gently and making sure tapioca doesn’t get sticky and stuck to each other. This should take about 6 to 7 minutes. \r\nAdd peanuts, lemon juice and cilantro (hara dhania), stir gently. \r\nServe hot and ENJOY.', 3, 'Indian', 10, 193, 0, 0),
(8, 'Bread Pakoda', 'Mix everything from Ajwain to Salt in a bowl. Add water slowly and keep on mixing it till the batter becomes smooth and thick. \r\nPrepare the Stuffing: \r\nBoil the potatoes either in Microwave or in a pressure cooker. Once boiled peel off the skin and cut into small 1/2 inches cubes. \r\nHeat the 2 tbsp oil in a frying pan. Add the Garam Masala powder (for ingredient in GMP do a search for it in the recipe section), and fry it for 1/2 minute. Add the finely sliced onion and fry it till it is light brown. \r\nAdd grated ginger and garlic and fry it for 3 minutes. Add the turmeric and red chili powder and fry it on slow heat for 10 min. \r\nNow add the boiled potato and fry it for another 5 minutes. Your stuffing is ready. \r\nPrepare the Bread Pakora: \r\nHeat the 1/2 cup oil in a frying pan. Take 2 triangular pieces of the bread and fill it with the potato stuffing. Dip it in the batter till it is entirely covered by the batter. Deep fry in the oil till for about 5 to 10 min. Remember to keep the oil in medium heat. \r\nIt is a very tasty snack and goes very well at tea time.', 4, 'Indian', 30, 489, 0, 0),
(9, 'Samosa', 'For dough: \r\nMake well in the flour. \r\nAdd oil, salt and little water.Mix well till crumbly. \r\nAdd more water little by little, kneading into soft pliable dough. \r\nCover with moist cloth, keep aside for 15-20 minutes. \r\nBeat dough on worksurface and knead again. Re-cover. \r\nFor filling: \r\nHeat 3 tbsp. oil, add ginger, green chilli, garlic, coriander seeds. \r\nStir fry for a minute, add onion, saute till light brown. \r\nAdd coriander, lemon, turmeric, salt, red chilli, garam masala. \r\nStir fry for 2 minutes, add potatoes. Stir further 2 minutes. \r\nCool. Keep aside. \r\nTo proceed: \r\nMake a thin 5 inches diam. round with some dough. \r\nCut into two halves. Run a moist finger along diameter. \r\nJoin and press together to make a cone. \r\nPlace a tbsp. of filling in the cone and seal third side as above. \r\nMake five to six. Put in hot oil, deep fry on low to medium till light brown. \r\nDo not fry on high, or the samosas will turn out oily and soggy. \r\nDrain on rack or kitchen paper. \r\nServe hot with green and tamarind chutneys or tomato sauce.', 4, 'Indian', 30, 310, 0, 0),
(10, 'Pulao', 'Gently wash rice and soak in water for about 10-15 minutes. \r\nHeat ghee in a pan. Add cloves, cinnamon, cumin seeds, bay leaf and cardamoms. \r\nNow add soaked rice and fry for 2 minutes. Add the mixture of cream, milk, sugar and salt.\r\n Add half a cup of water. Bring to a boil. Cover and simmer till cooked. When cooked, mix in chopped mixed fruit. \r\nSprinkle few drops of rose water before serving.', 3, 'Indian', 17, 203, 0, 0),
(11, 'Poori Bhajji', 'For poori: \r\n\r\nKnead firm dough by gradually adding water. Rest for one hour. \r\nMake puris and deep fry in hot oil till golden brown on both sides. \r\n\r\nFor bhaji: \r\n\r\nPressure cook potatoes and cut/mash them. Cut onions lengthwise and slit the green chillies. \r\nHeat oil in a pan. Add mustard seeds. When they splutter add cumin seeds fenugreek seeds and urad dal, \r\nand saute till urad dal turns golden brown. \r\nNow add the curry leaves, green chillies and ginger and fry for a while. Add turmeric powder and mix it well. \r\nAdd chopped onions. Saute till the onions turn golden brown. \r\nNow add potatoes and 1/2 a cup of water. Add salt to taste. When it comes to a boil cover \r\nand cook it on a low flame for about 10 minutes. \r\nServe hot with puris.', 5, 'Indian', 30, 450, 0, 0),
(12, 'Sweet Corn Salad', 'You don''t want to over bear the flavor of the fresh corn - just enough to enhance the flavor. To make chiffonade: Stack basil leaves, then cut across the stack to make small ribbons. Scrape the corn kernels from the ears of corn by using a sharp kitchen knfe and a large cutting board. Cut off the stem end to give a flat base. Hold the ear, tip end up, then cut downward, removing a few rows at a time. In a large pot, partially filled with water, bring water to a rolling boil.Add the corn kernels to the boiling water. Bring water back up to a boil; immediately remove from heat and drain corn in a colander in your sink. Run cold water over the corn in the colander to stop the cooking process; drain the corn thoroughly. In a large bowl, gently combine corn kernels, red onions, vinegar, olive oil, salt, and pepper. Adjust seasonings to taste. Refrigerate the salad until approximately half before serving. Just before serving, toss in the fresh basil. Taste for seasonings and serve cold or at room temperature.\r\n', 2, 'Indian', 10, 190, 0, 0),
(13, 'Chicken Cutlets', 'Cook the minced chicken with salt,turmeric powder and red chilli powder.\r\n Do not add any water as the chicken kheema would release a lot of water by itself.\r\n Let the water dry up completely. \r\nTake a pan add 1 tbsp of oil. Add the chopped onions, green chillies, curry leaves and coriander leaves.\r\n Add the fennel seeds powder and garam masala powder. Saute for 20 seconds and mix with the cooked kheema.\r\n Run the mixture in the mixer for half a minute so that your cutlet does not crumble while frying.\r\n Add the potatoes and mix well. \r\nMake balls of the desired size. Flatten it to the desired shape. Dip in the egg and then roll over breadcrumbs.\r\n Similarly make the remaining cutlets. The given quantity would make 17-20 cutlets. \r\nDeep fry till golden brown.', 4, 'Indian(Non-Veg)', 15, 182, 0, 0),
(14, 'Sambhar Vada', 'Heat one teaspoon oil in a pan and roast gram dal.\r\nAfter a minute, add urad dal.\r\nWhen they turn light brown, add rest of the ingredients for masala except turmeric.\r\nRoast on low fire for 5 to 10 minutes.\r\nGrind all masala to a fine paste, using a little water, if necessary.\r\nAdd turmeric.\r\nCook tuar dal and mung dal in pressure cooker till tender.\r\nAdd four cups water and salt.\r\nAlso add tamarind juice.\r\nHeat oil in a pan and fry mustard seeds.\r\nWhen they stop popping, add neem leaves and asafoetida and fry onion.\r\nCook for five minutes.\r\nAdd ground masala and cooked dal.\r\nLet simmer half covered for 10 to 15 minutes stirring occasionally.\r\nSoak urad dal for vadas for 4 to 6 hours.\r\nWash and grind to a fine paste.\r\nAdd salt, chillies and asafoetida.\r\nHeat oil in a frying pan.\r\nWith wet hands take about two teaspoons of the dal mixture, form a ball, press slightly and make a hole in the centre.\r\nImmerse vadas in hot oil.\r\nFry till light brown.\r\nAt a time, fry as many vadas as can be accommodated in the oil.\r\nSet aside.\r\nJust before serving warm up sambhar, immerse vadas and let soak for two minutes.\r\n', 3, 'South Indian', 20, 198, 0, 0),
(15, 'Egg Pakoda', '1. Hard boil six eggs and cut each egg in the middle length wise. \r\n\r\n2. Whisk one egg and prepare the batter by mixing besan with the egg whisked, green chili,\r\n\r\n red chili powder, ginger paste, ajwain, salt and chopped coriander leaves adding about half cup water.\r\n\r\n Mix in the corn flour to the batter. Adjust water so that the batter is of coating consistency. \r\n\r\n3. Heat oil and dip the egg halves in the batter and fry in medium heat to light brown. \r\n\r\nKeep fried egg Pakora in a dish with paper towel so that the excess oil is absorbed. \r\n\r\n4. Serve hot with green chutney.', 2, 'Indian(Non-Veg)', 15, 170, 0, 0),
(16, 'Dhokla', 'Soak the dal for 4 hours.\r\nGrind the soaked dal with the green chillies, adding a little water.\r\nAdd the methi, spinach, hing, turmeric, curds, oil and salt and mix well.\r\nWhen you wish to steam the dhoklas add the fruit salt to the batter, sprinkle a little water over it and mix gently.\r\nPour into a greased 175  thali and steam for 7 to 10 minutes.\r\nAllow it to cool for a few minutes.\r\nPrepare the tempering by heating the oil; add the rai and allow to crackle.\r\nAdd the jeera and hing and remove from the flame. Pour a teaspoon of\r\nWater into the oil once it has cooled and pour the tempering over the dhoklas.\r\nCut into squares, garnish with the coconut and serve hot with green chutney.', 4, 'Gujarati', 20, 220, 0, 0),
(17, 'Cheese and Spring Onion Sandwi', 'Place a lettuce leaf over a slice of bread.\r\nApply a generous layer of the spread over it.\r\nTop with the sliced tomatoes.\r\nSprinkle with salt and freshly ground pepper.\r\nSandwich with another slice of bread.\r\nRepeat with the remaining bread slices, tomatoes, lettuce and spread to make 3 more sandwiches.\r\nServe immediately.', 4, 'Indian', 10, 120, 0, 0),
(18, 'Cooked Rice Idli', 'Wash and soak the urad dal for at least 2 hours in lukewarm water.\r\nGrind it into a smooth batter along with the cooked rice.\r\nWash the idli rawa and add it to the batter along with the salt. \r\n(After adding the idli rawa, whip the mixture thoroughly so as to mix it well with the batter).\r\nMix well, cover and set aside overnight for fermenting.\r\nSpoon out the batter into greased idli moulds and steam for 15 minutes.\r\nServe hot with a chutney of your choice.', 5, 'South Indian', 18, 250, 0, 0),
(19, 'Soya Uttapum', 'Combine the soya milk and semolina in a bowl and keep aside for 10 minutes.\r\nAdd the green chillies, tomato, onion, coriander, fruit salt and salt and mix well.\r\nHeat a non-stick tava and grease it with oil.\r\nPour a ladle full of the batter and spread it using a circular motion.\r\nCook on both sides using a little oil.\r\nRepeat with the remaining batter.\r\nServe hot.', 4, 'South Indian', 20, 146.8, 0, 0),
(20, 'Khakhras', 'Combine the flour, salt and 1 tbsp of oil in a bowl and knead into a soft dough using enough water. Keep aside for 15 minutes.\r\nDivide the dough into 4 equal portions and roll out each portion into very thin rounds with help of a little flour.\r\nCook each khakhra lightly for a few seconds on both sides on a tawa (griddle).\r\nApply a little oil and cook again on a slow flame until crisp using little pressure with help of a cloth.\r\nRemove from the flame and allow to cool.\r\nStore in an air-tight jar.', 5, 'Gujarati', 25, 90, 0, 0),
(21, 'Medu Vada', 'Clean, wash and soak the urad dal in enough water for atleast 2 hours.\r\nDrain, add the green chillies, pepper, curry leaves and ginger and blend in a mixer to a smooth batter, adding little water.\r\nAdd the salt and mix well and divide the mixture into 8 equal portions. Keep aside.\r\nWet your hand,take a portion of themixture and make a hole in the centre with your thumb.\r\nHeta oil in a kadhai, upturn your hand and drop the wada in oil. Refer to the diagram or look and do.\r\nDeep fry the wada till both sides turn golden brown in colour.\r\nRepeat with the remaining batter to make 7 more medu wadas.\r\nDrain on absorbent paper. Serve hot with fried coconut chutney and sambhar.', 5, 'South Indian', 45, 334, 0, 0),
(22, 'American chop suey', 'Combine all the ingredients for the sauce in a pan, mix well and bring to a boil. Cook until the sauce is thick. Keep aside.\r\nHeat the oil in another pan and add the vegetables. Stir fry over a high flame for 3 to 4 minutes.\r\nAdd the prepared sauce, noodles, chilli sauce and salt and cook for a few minutes.\r\nAdd half of the fried noodles and mix well.\r\nServe hot, topped with the remaining fried noodles.', 4, 'Chinese', 45, 638, 0, 0),
(23, 'Handva', 'Wipe the rice, toovar dal, urad dal, moong dal, gram dal and wheat with a wet cloth,\r\n mix and grind dry coarsely (like semolina). Alternatively, soak the cereals and pulses\r\n overnight in plenty of water and grind in a mixer and the next day.\r\nAdd the sout curds and hot water and make into a thick mixture.\r\nCover and leave to ferment for at least 6 to 7 hours.\r\nMake a paste of the green chillies and ginger.\r\nGrate the pumpkin and squeeze out some of the water from it.\r\nNow add to the flour and dal mixture 4 tableTeaspoons of oil, the lemon juice,\r\nsoda bi-carb, sugar, chilli powder, turmeric powder, grated pumpkin, green chilli paste and salt. Mix well.\r\nSpread this batter in a greased tin or metal thali (flat metal plate with low rim).\r\nHeat 5 tableTeaspoons of oil in a vessel and add the mustard seeds.\r\nafter 1 minute, add the sesamse seeds, ajwain and asafoetida. When brown in colour, spread this oil all over the batter.\r\nBake in a hot oven at 450 degree F for 30 to 35 minutes or till the crust is brown jin colour.\r\nCut into pieces and serve with hot pickle and buttermilk.', 5, 'Gujarati', 420, 385, 0, 0),
(24, 'Thepla', 'Prepare a soft dough using all the ingredients.\r\nDivide into 8 rolls.\r\nWith a soft hand roll out the theplas one by one.\r\nFry theplas with a little oil on medium flame.', 5, 'Gujarati', 10, 298, 0, 0),
(25, 'Healthy Daliya', 'In a pressere cooker, add all the vegetables without any oil and pressure cook for 1 whistle.\r\nAllow the steam to escape before opening the lid.\r\nAdd the broken wheat and again cook for 5 minutes.\r\nAdd the salt and pepper and some water and pressure cook for 4 to 5 whistles or until the dalia is cooked.\r\nServe hot garnish with coriander.', 5, 'Indian', 10, 298, 0, 0),
(26, 'Italian Sandwich', 'Heat the butter in a pan, add the tomato paste and fresh cream and saute for 2 minutes.\r\nAdd the salt, pepper, oregano and chilli flakes and mix well.\r\nAdd the cooked macaroni and sauté for a while.\r\nTake two bread slices and remove the edges.\r\nApply some mayonnaise on both the slices and spread the macaroni mixture on one slice and grated cheese cube.\r\nCover it with the second slice to make a sandwich.\r\nGrill it for 3-4 minutes and cut the sandwich diagonally to divide it into two.', 3, 'Italian', 10, 380, 0, 0),
(27, 'JAM BUTTER SANDWICH', 'Cut the crusts off the bread and spread with soft butter or margarine. Then spread over filling of choice. Roll into ball and put in microwave for 35 secs. Allow to cool then eat!', 1, 'Indian', 10, 156, 0, 0),
(28, 'Sweet Potato Pancakes', 'In a bowl combine together sweet potatoes, water chestnut flour, cumin seeds, green chillies, sugar, salt and sufficient water and knead a soft dough.Divide the dough into ten equal portions and and shape them into balls Heat ghee in a non stick pan  and shallow fry till golden brown in colour.Serve hot with yogurt.', 3, 'Europian', 15, 267, 0, 0),
(29, 'HARA BHARA KABAB', 'Clean, wash and soak the chana dal for 1 hour.\r\nDrain, add the ginger, garlic, green chillies and half cup of water and pressure cook for 2 to 3 whistles or until the dal is cooked. Drain out and discard any excess water. Allow the steam to escape before opening the lid. Add the spinach, green peas and cooked dal mixture and blend in a mixer to a coarse paste without using any water.Add the paneer, chaat masala, garam masala, 1/4 cup bread crumbs and salt and mix well. Divide the mixture into 10 equal portions and shape each portion into a 50 mm. (2”) flat kebabs. Shaped kebab.Dip each kebab into the prepared flour- water paste and roll in the bread crumbs. Heat the oil in a non-stick kadhai and deep-fry them till they are golden brown in colour from both the sides. Serve hot with tomato ketchup and green chutney.', 3, 'Indian', 20, 250, 0, 0),
(30, 'PANEER AND GREEN PEAS BURGER', 'Cut a bun horizontally into two.Butter the bun halves using 1 tsp of butter and toast them lightly on a tava (griddle). Keep aside.Place the lower half of the bun on a clean, dry surface with the buttered side facing up.\r\nPlace a lettuce leaf on the bun and spread 1.5 tbsp of the mayonnaise over it.Place a cutlet, a few tomato slices and an onion slice over the cutlet. Finally sprinkle salt and pepper over it.Cover with the remaining half of the bun with the buttered side facing down and press it lightly.\r\nRepeat with the remaining ingredients to make 3 more burgers.', 4, 'American', 20, 300, 0, 0),
(31, 'PASTA IN TOMATO SAUCE', 'For the sauce Heat the butter in a broad pan, add the garlic and spring onions and sauté on a medium flame for a minute.Add the tomato pulp, chilli powder, tomato purée, salt and half cup of water and cook on a medium flame till the sauce thickens.How to proceed Add the cream and pasta , mix well and toss gently.\r\nTop with cheese and spring onions.For the cutlets Combine all the ingredients in a bowl and mix well.Divide the mixture into 4 equal portions and shape each portion into a 100 mm. thick flat cutlet.Roll each cutlet in bread crumbs till they are evenly coated from both the sides.Heat the oil in a kadhai and deep-fry the cutlets till they turn golden brown in colour from both the sides.Drain on absorbent paper and keep aside.', 3, 'Italian', 25, 250, 0, 0),
(32, 'PAV BHAJI', 'For the chilli-garlic pasteSoak the red chillies in enough warm water for atleast an hour.Drain the chillies, add the garlic and blend in a mixer till smooth, adding enough water. Keep aside. For the bhaji Heat the oil and 1 tbsp of butter in a kadhai and add the cumin seeds.When the seeds crackle, add the chilli-garlic paste and sauté on a medium flame for a few seconds.Add the capsicum and sauté on a medium flame for a minute. Add the onions and sauté on a medium flame till they turn light pink in colour. Add the tomatoes, chilli powder, pav bhaji masala, salt and half cup of water,mix well and cook on a medium flame for 5 to 7 minutes or till the oil separates. Add the potatoes, moong sprouts, green peas, coriander, half cup of water and remaining 1 tbsp of butter and cook on a medium flame for 5 to 7 minutes, while stirring continuously. For the pav Slit 2 pavs vertically and keep aside. Heat a tava (griddle), add 2 tsp of butter. Slit open the pavs, place on it and cook on a medium flame till they turn light brown and crisp on both the sides.', 3, 'Indian', 25, 250, 0, 0),
(33, 'BABY UTTAPAM', 'Drain and grind urad till fine and fluffy. Transfer into a bowl. Drain and grind rice till smooth. And transfer it into the same bowl and mix the two batters well. Set aside in a warm place to ferment overnight.Add salt and whisk well.Heat a non stick dosa tawa and spread small amounts of batter into small uttapams keeping a little distance between each.Slice onion and sprinkle a little on each uttapam. Slice green capsicum and sprinkle a little on each uttapam. Slice tomato and sprinkle a little on each uttapam. Sprinkle a little mozzarella cheese on each.Drizzle a little oil around each, cover and cook on medium heat till they get cooked and the cheese melts. Serve hot.', 4, 'South Indian', 20, 20, 0, 0),
(34, 'MIA DOSA', 'Grind moong and rice with little water. Add green chillies, curry leaves and ginger and grind to a  coarse paste. Transfer into a bowl, add water to adjust consistency. Add salt and mix well and set aside. For upma, heat oil in a non-stick pan. Chop onion roughly. Add mustard seeds, asafoetida, cumin  seeds, urad dal, curry leaves and onion to the pan and sauté till fragrant. Add semolina and sauté for 2 minutes. Heat a non sticktawa, pour a ladle full of batter to 4-inch diameter dosa. Add 1.5 cups hot water and salt to rawa and mix well and let it cook till done. Turn over the dosa, put some upma on one side, and fold the other side over. Serve hot', 3, 'South Indian', 20, 157, 0, 0),
(35, 'MYSORE VADAI', 'Drain the soaked dals and grind them to a coarse paste without adding any water. Remove the mixture into a bowl and add cashewnuts, melon seeds, coriander leaves, curry leaves, ginger and salt and mix well. Heat sufficient oil in a kadai on medium heat. Drop spoonsful of mixture into the oil and deep fry till golden brown and crisp. Drain on absorbent paper. Serve hot with coconut chutney.', 4, 'South Indian', 10, 250, 0, 0),
(36, 'Koraishutir Kochuri', 'Sift flour with salt. Add two tablespoons of melted ghee and knead to a soft dough using water as  required. Heat the remaining ghee in a kadai. Add fennel seeds, asafoetida, green chillies and ginger and sauté lightly. Add green peas and salt and mix. Continue to sauté till almost dry. Transfer into a plate and set aside to cool. Divide the dough into eight equal portions. Spread each portion into a small puri with your fingers. Place some stuffing in the centre and bring in the edges together and press to enclose the stuffing well. Roll into slightly thick puris. Heat sufficient oil in a kadai and deep fry till light brown. Drain and place on an absorbent paper and serve hot with cholar dal.', 4, 'Bengali', 10, 330, 0, 0),
(37, 'NIMKI', 'Place maida in a bowl. Add ghee, carom seeds, ¼ tsp crushed black pepper powder and salt. Add enough water and knead into hard dough. Heat sufficient oil in a kadai. Slice paneer. Apply ½ tsp oil to the dough and make a long roll. Cut into equal pieces and shape into balls.Roll out each ball into a puri. Place a paneer slice in the centre and sprinkle dried mango powder, red chilli powder, remaining crushed black peppercorns, chaat masala, turmeric powder, caraway seeds and salt. Fold the puri into a triangle. Deep fry the triangles in hot oil on low heat till golden brown. Drain on absorbent paper.Serve hot.', 4, 'Bengali', 15, 250, 0, 0),
(38, 'PUCHKA', 'Place maida in a bowl. Add ghee, carom seeds, ¼ tsp crushed black pepper powder and salt. Add enough water and knead into hard dough.Heat sufficient oil in a kadai. Slice paneer. Apply ½ tsp oil to the dough and make a long roll. Cut into equal pieces and shape into balls. Roll out each ball into a puri. Place a paneer slice in the centre and sprinkle dried mango powder,  red chilli powder, remaining crushed black peppercorns, chaat masala, turmeric powder, caraway  seeds and salt. Fold the puri into a triangle. Deep fry the triangles in hot oil on low heat till golden brown. Drain on absorbent paper. Serve hot.', 2, 'Indian', 15, 150, 0, 0),
(39, 'BEGUN BHAJA', 'Remove the stems, wash and cut the brinjals into half and then further cut them into half centimetre thick slices. Sprinkle turmeric powder, one teaspoon red chilli powder, lemon juice and salt on both sides of the brinjal slices. Apply poppy seeds on both sides. Keep aside for fifteen minutes. Heat sufficient oil in a kadai and deep-fry the brinjal pieces till crisp and brown. Drain onto an absorbent paper. Sprinkle salt and remaining red chilli powder. Serve hot.', 2, 'Bengali', 20, 178, 0, 0),
(40, 'CHEESE AND POTATO FRIES', 'Combine the butter, olive oil, cornflour, garlic, oregano, rosemary, pepper and salt in a bowl.\r\nAdd the potatoes, toss well till they are coated from all the sides and keep aside to marinate for at least 10 to 12 minutes.\r\nPlace the potatoes in a greased baking tray in a single layer and bake in a pre-heated oven at 200°c (400°f) for 20 to 25 minutes or till the potatoes are cooked and crisp, turning once in between. Sprinkle the processed cheese evenly on top, toss well using a spoon and bake for another 3 to 4 minutes.', 3, 'French', 15, 198, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hasseen`
--

CREATE TABLE IF NOT EXISTS `hasseen` (
  `Uname` varchar(30) NOT NULL,
  `Dname` varchar(30) NOT NULL,
  `on_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Uname`,`Dname`),
  KEY `Dname` (`Dname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `Iname` varchar(40) NOT NULL,
  `unit` varchar(10) NOT NULL,
  PRIMARY KEY (`Iname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`Iname`, `unit`) VALUES
('Asafoetida', 'Teaspoon'),
('Baking Powder', 'Teaspoon'),
('Baking Soda', 'Teaspoon'),
('Basil Leaves', 'Cup'),
('Batter', 'Measure'),
('Bay Leaves', 'Number'),
('Bean Sprouts', 'Cup'),
('Bengal Gram', 'Tablespoon'),
('Black Mustard Seeds', 'Teaspoon'),
('Bread', 'Slices'),
('Breadcrumbs', 'Cup'),
('Brinjals', 'Number'),
('Broken Wheat', 'Cup'),
('Brown Vinegar', 'Cup'),
('Burger Buns', 'Number'),
('Butter', 'Teaspoon'),
('Cabbage', 'Cup'),
('Capsicum', 'Cup'),
('Caraway Seeds', 'Teaspoon'),
('Cardamom', 'Number'),
('Carrots', 'Cup'),
('Cashewnuts', 'Number'),
('Cauliflower', 'Number'),
('Celery ', 'Tablespoon'),
('Chat Masala', 'Teaspoon'),
('Cheese', 'Cube'),
('Chhola Daal', 'Cup'),
('Chicken', 'Grams'),
('Chilli Sauce', 'Teaspoon'),
('Cider Vinegar', 'Tablespoon'),
('Cilantro', 'Teaspoon'),
('Cinnamon ', 'Number'),
('Cloves', 'Number'),
('Coconut', 'Number'),
('Coconut Milk', 'Cup'),
('Coconut Oil', 'Teaspoon'),
('Coriander Leaves', 'Tablespoon'),
('Coriander Seed Powder', 'Teaspoon'),
('Corn', 'Number'),
('Corn Flour', 'Cup'),
('Cream', 'Cup'),
('Crisp Puris', 'Number'),
('Cummin Seed Powder', 'Teaspoon'),
('Curd', 'Tablespoon'),
('Curry Leaves', 'Number'),
('Dark Chocolate', 'Cup'),
('Dill Leaves', 'Tablespoon'),
('Dry Chillies', 'Number'),
('Dry Mango Powder', 'Teaspoon'),
('Eggs', 'Number'),
('Fennel Seed Powder ', 'Tablespoon'),
('Fenugreek Seeds', 'Number'),
('French Beans', 'Cup'),
('Fruit Salt', 'Teaspoon'),
('Fruits', 'Cup'),
('Garlic', 'Number'),
('Ginger', 'Number'),
('Ginger Garlic Chilli Paste', 'Tablespoon'),
('Ginger Green Chilli Paste', 'Tablespoon'),
('Gourd', 'Grams'),
('Gram Daal', 'Teaspoon'),
('Gram Flour', 'Cup'),
('Green Cardamom Powder', 'Teaspoon'),
('Green Chillies', 'Number'),
('Green Chutney', 'Tablespoon'),
('Green Onion', 'Number'),
('Green Peas', 'Cup'),
('Jam', 'Teaspoon'),
('Khoya', 'Cup'),
('Kolam Rice', 'Tablespoon'),
('Ladi Pav', 'Number'),
('Lemon ', 'Number'),
('Lettuce Leaves', 'Number'),
('Macroni', 'Cup'),
('Mayonnaise', 'Cup'),
('Meetha Neem Leaves', 'Number'),
('Melon Seeds', 'Tablespoon'),
('Milk', 'Cup'),
('Mint', 'Teaspoon'),
('Mint Leaves', 'Number'),
('Mixed Vegetables', 'Cup'),
('Moong Daal', 'Tablespoon'),
('Mozzarella Cheese', 'Cup'),
('Mustard Oil', 'Tablespoon'),
('Nigella', 'Teaspoon'),
('Noodles', 'Cup'),
('Olive Oil', 'Tablespoon'),
('Onion', 'Number'),
('Oregano', 'Teaspoon'),
('Paneer ', 'Cup'),
('Pasta', 'Cup'),
('Pav Bhaji Masala', 'Teaspoon'),
('Peanuts', 'Number'),
('Plain Flour', 'Cup'),
('Poha', 'Cup'),
('Poppy Seeds', 'Tablespoon'),
('Potatoes', 'Number'),
('Red Chilli Flakes', 'Teaspoon'),
('Red Chilli Powder', 'Teaspoon'),
('Rice', 'Grams'),
('Rice Semolina', 'Cup'),
('Rose Water', 'Cup'),
('Rosemary', 'Teaspoon'),
('Sambhar', 'Cup'),
('Semolina', 'Cup'),
('Semolina Flour', 'Cup'),
('Soya Milk', 'Cup'),
('Soya Sauce', 'Tablespoon'),
('Spinach', 'Cup'),
('Sweet Potatoes', 'Cup'),
('Tamarind Pulp', 'Teaspoon'),
('Tapioca', 'Cup'),
('Tomato Puree', 'Cup'),
('Tomatoes', 'Number'),
('Tuar Daal', 'Cup'),
('Turmeric Powder', 'Teaspoon'),
('Urat Daal', 'Teaspoon'),
('Water Chestnur Flour', 'Tablespoon'),
('Water Chestnut Flour', 'Cup'),
('Wheat Flour', 'Cup'),
('White Sesame Seeds', 'Teaspoon'),
('Yam', 'Grams'),
('Yogurt', 'Cup');

-- --------------------------------------------------------

--
-- Table structure for table `madeof`
--

CREATE TABLE IF NOT EXISTS `madeof` (
  `Dish_id` int(11) NOT NULL,
  `Iname` varchar(40) NOT NULL,
  `essential` char(1) NOT NULL,
  `quantity` double NOT NULL,
  PRIMARY KEY (`Dish_id`,`Iname`),
  KEY `Iname` (`Iname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `madeof`
--

INSERT INTO `madeof` (`Dish_id`, `Iname`, `essential`, `quantity`) VALUES
(1, 'Coconut', 'N', 0.25),
(1, 'Coriander Leaves', 'N', 1),
(1, 'Coriander Seed Powder', 'N', 0.5),
(1, 'Cummin Seed Powder', 'N', 0.5),
(1, 'Curry Leaves', 'N', 5),
(1, 'Ginger', 'N', 1),
(1, 'Green Chillies', 'Y', 2),
(1, 'Green Peas', 'Y', 0.5),
(1, 'Lemon', 'Y', 1),
(1, 'Onion', 'Y', 1),
(1, 'Poha', 'Y', 1.5),
(1, 'Potatoes', 'Y', 1),
(1, 'Turmeric Powder', 'N', 0.5),
(2, 'Asafoetida', 'N', 0.25),
(2, 'Cauliflower', 'Y', 2),
(2, 'Cilantro', 'N', 2),
(2, 'Coriander Seed Powder', 'Y', 0.5),
(2, 'Cummin Seed Powder', 'N', 0.5),
(2, 'Dry Mango Powder', 'N', 0.25),
(2, 'Ginger', 'N', 1),
(2, 'Green Chillies', 'N', 1),
(2, 'Mint', 'N', 0.25),
(2, 'Onion', 'Y', 1),
(2, 'Plain Flour', 'Y', 0.5),
(2, 'Potatoes', 'Y', 1),
(2, 'Turmeric Powder', 'N', 0.25),
(2, 'Wheat Flour', 'Y', 0.75),
(3, 'Black Mustard Seeds', 'Y', 0.5),
(3, 'Cilantro', 'N', 2),
(3, 'Cummin Seed Powder', 'Y', 0.5),
(3, 'Green Peas', 'N', 0.25),
(3, 'Lemon', 'N', 1),
(3, 'Peanuts', 'N', 20),
(3, 'Semolina Flour', 'Y', 0.5),
(4, 'Batter', 'Y', 2),
(4, 'Butter', 'N', 1),
(4, 'Cilantro', 'N', 1),
(4, 'Curry Leaves', 'Y', 5),
(4, 'Dry Chillies', 'Y', 2),
(4, 'Ginger', 'N', 0.5),
(4, 'Mustard Oil', 'Y', 3),
(4, 'Semolina', 'Y', 7),
(5, 'Bread', 'Y', 4),
(5, 'Coriander Leaves', 'N', 1),
(5, 'Eggs', 'Y', 4),
(5, 'Onion', 'Y', 0.5),
(5, 'Red Chilli Powder', 'N', 1),
(5, 'Tomatoes', 'Y', 0.5),
(5, 'Turmeric Powder', 'N', 0.25),
(6, 'Bread', 'Y', 2),
(6, 'Butter', 'Y', 1),
(6, 'Cheese', 'Y', 2),
(6, 'Eggs', 'Y', 2),
(6, 'Tomatoes', 'Y', 1),
(7, 'Black Mustard Seeds', 'N', 0.5),
(7, 'Cilantro', 'N', 2),
(7, 'Cummin Seed Powder', 'N', 0.5),
(7, 'Green chillies', 'N', 2),
(7, 'Green Peas', 'Y', 0.5),
(7, 'Lemon', 'N', 1),
(7, 'Peanuts', 'Y', 20),
(7, 'Tapioca', 'Y', 1.5),
(7, 'Turmeric Powder', 'N', 0.25),
(8, 'Asafoetida', 'N', 0.25),
(8, 'Baking Powder', 'Y', 0.25),
(8, 'Bread', 'Y', 8),
(8, 'Garlic', 'N', 2),
(8, 'Ginger', 'N', 0.5),
(8, 'Gram Flour', 'Y', 1),
(8, 'Onion', 'Y', 1),
(8, 'Potatoes', 'Y', 2),
(8, 'Red Chilli powder', 'N', 0.5),
(8, 'Turmeric Powder', 'N', 0.5),
(9, 'Coriander Leaves', 'N', 1),
(9, 'Coriander Seed Powder', 'Y', 0.5),
(9, 'Garlic', 'N', 0.5),
(9, 'Ginger', 'N', 0.5),
(9, 'Green Chillies', 'N', 2),
(9, 'Lemon ', 'Y', 0.5),
(9, 'Onion', 'Y', 1),
(9, 'Plain Flour', 'Y', 1),
(9, 'Potatoes', 'Y', 2),
(9, 'Turmeric Powder', 'N', 0.5),
(10, 'Bay Leaves', 'N', 2),
(10, 'Cardamom', 'N', 4),
(10, 'Cinnamon', 'N', 1),
(10, 'Cloves', 'Y', 4),
(10, 'Cream', 'Y', 2.5),
(10, 'Milk', 'Y', 2),
(10, 'Rice', 'Y', 500),
(10, 'Rose Water', 'N', 0.25),
(11, 'Black Mustard Seeds', 'N', 0.5),
(11, 'Cummin Seed Powder', 'N', 0.5),
(11, 'Curry Leaves', 'N', 5),
(11, 'Fenugreek Seeds', 'N', 5),
(11, 'Ginger', 'N', 0.5),
(11, 'Green Chillies', 'Y', 6),
(11, 'Onion', 'Y', 1),
(11, 'Potatoes', 'Y', 3),
(11, 'Turmeric Powder', 'Y', 0.5),
(11, 'Urat Daal', 'Y', 1),
(11, 'Wheat Flour', 'Y', 2),
(12, 'Basil Leaves', 'N', 0.5),
(12, 'Cider Vinegar', 'N', 3),
(12, 'Corn', 'Y', 5),
(12, 'Olive Oil', 'N', 3),
(12, 'Onion', 'Y', 0.5),
(13, 'Breadcrumbs', 'Y', 1.5),
(13, 'Chicken', 'Y', 500),
(13, 'Coriander Leaves', 'N', 5),
(13, 'Eggs', 'N', 1),
(13, 'Fennel Seed Powder', 'N', 1),
(13, 'Ginger', 'N', 1),
(13, 'Green Chillies', 'Y', 2),
(13, 'Onion', 'Y', 2),
(13, 'Potatoes', 'Y', 2),
(13, 'Red Chilli Powder', 'N', 0.25),
(13, 'Turmeric Powder', 'N', 0.5),
(14, 'Asafoetida', 'Y', 0.25),
(14, 'Black Mustard Seeds', 'Y', 0.75),
(14, 'Cinnamon', 'N', 2),
(14, 'Cloves', 'N', 3),
(14, 'Coconut', 'N', 1),
(14, 'Coriander Seed Powder', 'N', 2),
(14, 'Cummin Seed Powder', 'Y', 0.25),
(14, 'Dry Chillies', 'N', 10),
(14, 'Fenugreek Seeds', 'N', 2),
(14, 'Gram Daal', 'Y', 1),
(14, 'Green Chillies', 'N', 0.5),
(14, 'Meetha Neem Leaves', 'N', 10),
(14, 'Moong Daal', 'Y', 2),
(14, 'Onion', 'Y', 1),
(14, 'Tuar Daal', 'Y', 1),
(14, 'Turmeric Powder', 'Y', 1),
(14, 'Urat Daal', 'Y', 1),
(15, 'Cilantro', 'Y', 3),
(15, 'Corn Flour', 'Y', 0.5),
(15, 'Eggs', 'Y', 7),
(15, 'Ginger', 'N', 0.5),
(15, 'Gram Flour', 'Y', 0.75),
(15, 'Green Chillies', 'N', 2),
(15, 'Red Chilli Powder', 'N', 0.5),
(16, 'Asafoetida', 'Y', 0.25),
(16, 'Black Mustard Seeds', 'N', 0.5),
(16, 'Chhola Daal', 'Y', 1),
(16, 'Cummin Seed Powder', 'N', 0.5),
(16, 'Curd', 'Y', 2),
(16, 'Fenugreek Seeds', 'N', 0.5),
(16, 'Green Chillies', 'N', 3),
(16, 'Spinach', 'Y', 0.5),
(16, 'Turmeric Powder', 'N', 0.25),
(17, 'Bread', 'Y', 8),
(17, 'Celery', 'N', 2),
(17, 'Cheese', 'Y', 2),
(17, 'Garlic', 'N', 1),
(17, 'Lettuce Leaves', 'N', 4),
(17, 'Mayonnaise', 'N', 0.25),
(17, 'Onion', 'Y', 3),
(17, 'Tomatoes', 'Y', 1),
(18, 'Rice', 'Y', 1),
(18, 'Rice Semolina', 'Y', 1),
(18, 'Urat Daal', 'Y', 0.5),
(19, 'Coriander Leaves', 'N', 2),
(19, 'Fruit Salt', 'N', 0.5),
(19, 'Green Chillies', 'N', 2),
(19, 'Onion', 'Y', 1),
(19, 'Semolina', 'Y', 2),
(19, 'Soya Milk', 'Y', 2),
(19, 'Tomatoes', 'N', 1),
(20, 'Wheat Flour', 'Y', 1),
(21, 'Coconut', 'Y', 1),
(21, 'Coconut Oil', 'Y', 5),
(21, 'Curry Leaves', 'N', 8),
(21, 'Ginger', 'Y', 1),
(21, 'Green Chillies', 'N', 3),
(21, 'Sambhar', 'N', 2),
(21, 'Urat Daal', 'Y', 1),
(22, 'Bean Sprouts', 'N', 0.5),
(22, 'Brown Vinegar', 'N', 0.25),
(22, 'Cabbage', 'Y', 1.5),
(22, 'Carrots', 'Y', 0.5),
(22, 'Chilli Sauce', 'N', 0.5),
(22, 'Corn Flour', 'Y', 2),
(22, 'French beans ', 'N', 0.5),
(22, 'Noodles', 'Y', 0.75),
(22, 'Onion', 'Y', 2),
(22, 'Soya Sauce', 'N', 1),
(23, 'Asafoetida', 'N', 0.5),
(23, 'Baking Soda', 'Y', 1),
(23, 'Black Mustard Seeds', 'N', 2),
(23, 'Broken Wheat', 'Y', 2),
(23, 'Curd', 'Y', 0.75),
(23, 'Ginger', 'N', 1),
(23, 'Gourd', 'Y', 450),
(23, 'Gram Daal', 'Y', 2),
(23, 'Green Chillies', 'N', 10),
(23, 'Lemon', 'N', 0.5),
(23, 'Red Chilli Powder', 'N', 1),
(23, 'Rice', 'Y', 1.5),
(23, 'Tuar Daal', 'Y', 0.75),
(23, 'Turmeric Powder', 'N', 0.25),
(23, 'Urat Daal', 'Y', 2),
(23, 'White Sesame Seeds', 'N', 2),
(24, 'Coriander Seed Powder', 'N', 2),
(24, 'Curd', 'Y', 2),
(24, 'Moong Daal', 'Y', 1),
(24, 'Red Chilli Powder', 'N', 2),
(24, 'Turmeric Powder', 'N', 0.25),
(24, 'Wheat Flour', 'Y', 1),
(25, 'Broken Wheat', 'Y', 0.25),
(25, 'Coriander Leaves', 'N', 10),
(25, 'Mixed Vegetables', 'Y', 2),
(25, 'Onion', 'N', 1),
(25, 'Tomatoes', 'N', 1),
(26, 'Bread', 'Y', 2),
(26, 'Butter', 'Y', 1),
(26, 'Cream', 'N', 3),
(26, 'Macroni', 'Y', 1),
(26, 'Mayonnaise', 'Y', 3),
(26, 'Oregano', 'Y', 0.5),
(26, 'Red Chilli Flakes', 'N', 2),
(26, 'Tomato Puree', 'N', 0.5),
(27, 'Bread', 'Y', 1),
(27, 'Butter', 'Y', 2),
(27, 'Jam', 'Y', 2),
(28, 'Butter', 'N', 2),
(28, 'Cheese', 'Y', 4),
(28, 'Corn Flour', 'Y', 2),
(28, 'Garlic', 'N', 0.5),
(28, 'Olive Oil', 'Y', 1),
(28, 'Oregano', 'N', 1),
(28, 'Potatoes', 'Y', 4),
(28, 'Rosemary', 'N', 0.5),
(29, 'Breadcrumbs', 'N', 0.75),
(29, 'Garlic', 'N', 2),
(29, 'Ginger', 'Y', 2),
(29, 'Gram Daal', 'Y', 0.25),
(29, 'Green Chillies', 'N', 3),
(29, 'Green Chutney', 'N', 1),
(29, 'Green Peas', 'Y', 0.5),
(29, 'Paneer', 'N', 0.5),
(29, 'Plain Flour', 'Y', 0.25),
(29, 'Spinach', 'Y', 1),
(30, 'Breadcrumbs', 'N', 2),
(30, 'Burger Buns', 'Y', 4),
(30, 'Butter', 'Y', 4),
(30, 'Coriander Leaves', 'N', 2),
(30, 'Green Chillies ', 'N', 5),
(30, 'Green Peas', 'Y', 0.5),
(30, 'Lettuce Leaves', 'N', 4),
(30, 'Mayonnaise', 'Y', 6),
(30, 'Onion', 'Y', 4),
(30, 'Paneer', 'Y', 0.5),
(30, 'Potatoes', 'Y', 0.25),
(30, 'Tomatoes', 'Y', 1),
(31, 'Butter', 'Y', 1),
(31, 'Cheese', 'N', 4),
(31, 'Cream', 'Y', 4),
(31, 'Garlic', 'N', 1),
(31, 'Green Onion', 'N', 1),
(31, 'Onion', 'Y', 4),
(31, 'Pasta', 'Y', 3),
(31, 'Red Chilli Powder', 'N', 1),
(31, 'Tomato Puree', 'Y', 2),
(31, 'Tomatoes', 'Y', 2),
(32, 'Bean Sprouts', 'N', 0.7),
(32, 'Butter', 'Y', 2),
(32, 'Capsicum', 'N', 0.5),
(32, 'Coriander Leaves', 'Y', 10),
(32, 'Cummin Seed Powder', 'N', 1),
(32, 'Garlic', 'Y', 0.5),
(32, 'Green Chillies', 'Y', 1),
(32, 'Green Peas', 'Y', 0.5),
(32, 'Ladi Pav', 'Y', 8),
(32, 'Onion', 'Y', 0.7),
(32, 'Potatoes', 'Y', 2),
(32, 'Red Chilli Powder', 'N', 2),
(32, 'Tomatoes', 'N', 1.5),
(33, 'Capsicum', 'N', 1),
(33, 'Mozzarella Cheese', 'N', 1),
(33, 'Onion', 'Y', 1),
(33, 'Rice', 'Y', 2),
(33, 'Tomatoes', 'N', 1),
(33, 'Urat Daal', 'Y', 1),
(34, 'Black Mustard Seeds', 'N', 0.25),
(34, 'Curry leaves', 'N', 8),
(34, 'Ginger', 'N', 1),
(34, 'Green Chillies', 'N', 3),
(34, 'Kolam Rice', 'Y', 2),
(34, 'Moong Daal', 'Y', 1),
(34, 'Semolina ', 'Y', 0.75),
(35, 'Asafoetida', 'N', 0.25),
(35, 'Ginger', 'N', 1),
(35, 'Green Chillies', 'N', 4),
(35, 'Green Peas', 'Y', 1),
(35, 'Plain Flour', 'Y', 1),
(36, 'Caraway Seeds', 'N', 0.5),
(36, 'Cheese', 'N', 2),
(36, 'Plain Flour', 'Y', 2),
(36, 'Red Chilli Powder', 'Y', 0.5),
(36, 'Turmeric Powder', 'Y', 0.5),
(37, 'Crisp Puris', 'Y', 24),
(37, 'Cummin Seed Powder', 'N', 1),
(37, 'Gram Daal', 'N', 1),
(37, 'Potatoes', 'Y', 2),
(37, 'Red Chilli Powder', 'N', 0.5),
(37, 'Tamarind Pulp', 'Y', 2),
(38, 'Brinjals', 'Y', 4),
(38, 'Lemon', 'Y', 1),
(38, 'Poppy Seeds', 'N', 4),
(38, 'Red Chilli Powder', 'Y', 1.5),
(38, 'Turmeric Powder', 'N', 1),
(39, 'Cummin Seed Powder', 'Y', 1),
(39, 'Water Chestnut Flour', 'Y', 1),
(40, 'Cabbage', 'Y', 1),
(40, 'Chat Masala', 'N', 0.5),
(40, 'Coriander Leaves', 'N', 10),
(40, 'Cummin Seed Powder', 'N', 1),
(40, 'Garlic', 'N', 1),
(40, 'Ginger', 'N', 1),
(40, 'Green Chillies', 'Y', 1),
(40, 'Green Peas', 'N', 0.5),
(40, 'Lemon', 'N', 1),
(40, 'Plain Flour', 'Y', 2),
(40, 'Potatoes', 'Y', 2),
(40, 'Red Chilli Powder', 'N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rated`
--

CREATE TABLE IF NOT EXISTS `rated` (
  `Uname` varchar(30) NOT NULL,
  `Dname` varchar(30) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`Uname`,`Dname`),
  KEY `Dname` (`Dname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `Uname` varchar(30) NOT NULL,
  `Dname` varchar(30) NOT NULL,
  `Quant` int(11) NOT NULL,
  `dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Uname`,`Dname`),
  KEY `Dname` (`Dname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Uname` varchar(30) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(40) NOT NULL,
  `security_que` varchar(100) NOT NULL,
  `security_ans` varchar(25) NOT NULL,
  `num_of_dishes_in_cart` int(11) NOT NULL,
  PRIMARY KEY (`Uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasseen`
--
ALTER TABLE `hasseen`
  ADD CONSTRAINT `hasseen_ibfk_1` FOREIGN KEY (`Uname`) REFERENCES `users` (`Uname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasseen_ibfk_2` FOREIGN KEY (`Dname`) REFERENCES `dish` (`Dname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `madeof`
--
ALTER TABLE `madeof`
  ADD CONSTRAINT `madeof_ibfk_1` FOREIGN KEY (`Dish_id`) REFERENCES `dish` (`Dish_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `madeof_ibfk_2` FOREIGN KEY (`Iname`) REFERENCES `ingredient` (`Iname`) ON UPDATE CASCADE;

--
-- Constraints for table `rated`
--
ALTER TABLE `rated`
  ADD CONSTRAINT `rated_ibfk_1` FOREIGN KEY (`Uname`) REFERENCES `users` (`Uname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rated_ibfk_2` FOREIGN KEY (`Dname`) REFERENCES `dish` (`Dname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`Uname`) REFERENCES `users` (`Uname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`Dname`) REFERENCES `dish` (`Dname`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
