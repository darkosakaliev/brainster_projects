-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 04:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project02`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `bio` varchar(1024) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `bio`, `is_deleted`) VALUES
(1, 'Frank', 'Herbert', 'Franklin Patrick Herbert Jr. was an American science fiction author best known for the 1965 novel Dune and its five sequels. Though he became famous for his novels, he also wrote short stories and worked as a newspaper journalist, photographer, book reviewer, ecological consultant, and lecturer.', 0),
(2, 'Cal', 'Newport', 'Calvin C. Newport is an American non-fiction author and associate professor of computer science at Georgetown University. His work focuses on distributed algorithms in challenging networking scenarios, and incorporates the study of communications systems in nature. Newport is currently Provost\'s Distinguished Associate Professor in the Department of Computer Science at Georgetown University and the author of eight books.', 0),
(3, 'Duncan', 'Clark', 'An early advisor to leading China Internet entrepreneurs, Duncan is author of ‘Alibaba: The House That Jack Ma Built’, the definitive work on China’s e-commerce and technology giant, its founder Jack Ma, and the forces and people that propelled its rise.  Published in 2016 in English by HarperCollins, ‘Alibaba’ was named a Book of the Year by The Economist magazine and short-listed for ‘Business Book of the Year’ by the Financial Times/McKinsey.', 0),
(4, 'Carol S.', 'Dweck', 'Carol Susan Dweck (born October 17, 1946) is an American psychologist. She is the Lewis and Virginia Eaton Professor of Psychology at Stanford University. Dweck is known for her work on mindset. She was on the faculty at Columbia University, Harvard University, and the University of Illinois before joining the Stanford University faculty in 2004. She is a Fellow of the Association for Psychological Science.', 0),
(5, 'Matthew', 'Walker', 'Matthew Paul Walker is an English scientist and professor of neuroscience and psychology at the University of California, Berkeley. He is a public intellectual focused on the subject of sleep. As an academic, Walker has focused on the impact of sleep on human health. He has contributed to many scientific research studies. Walker became a public intellectual following the publication of Why We Sleep, his first work of popular science, in 2017. It became an international bestseller.', 0),
(6, 'Sylvia', 'Plath', 'Sylvia Plath (October 27, 1932 – February 11, 1963) was an American poet, novelist, and short-story writer. She is credited with advancing the genre of confessional poetry and is best known for two of her published collections, The Colossus and Other Poems (1960) and Ariel (1965), as well as The Bell Jar, a semi-autobiographical novel published shortly before her death in 1963. The Collected Poems were published in 1981, which included previously unpublished works.', 0),
(7, 'Agatha', 'Christie', 'Dame Agatha Mary Clarissa Christie, Lady Mallowan, DBE (née Miller; 15 September 1890 – 12 January 1976) was an English writer known for her 66 detective novels and 14 short story collections, particularly those revolving around fictional detectives Hercule Poirot and Miss Marple. She also wrote the world\'s longest-running play, The Mousetrap, which has been performed in the West End since 1952, as well as six novels under the pseudonym Mary Westmacott.', 0),
(8, 'Nicholas', 'Sparks', 'Nicholas Charles Sparks (born 31 December 1965) is an American novelist, screenwriter, and philanthropist. He has published twenty-two novels and two non-fiction books, some of which have been New York Times bestsellers, with over 115 million copies sold worldwide in more than 50 languages. Eleven of his novels have been adapted to film, including The Choice, The Longest Ride, The Best of Me, Safe Haven (on all of which he served as a producer), The Lucky One, Message in a Bottle, A Walk to Remember, Nights in Rodanthe, Dear John, The Last Song, and The Notebook.', 0),
(9, 'George', 'Orwell', 'Eric Arthur Blair (25 June 1903 – 21 January 1950), known by his pen name George Orwell, was an English novelist, essayist, journalist and critic. His work is characterised by lucid prose, social criticism, opposition to totalitarianism, and support of democratic socialism.\r\nOrwell produced literary criticism and poetry, fiction and polemical journalism. He is known for the allegorical novella Animal Farm (1945) and the dystopian novel Nineteen Eighty-Four (1949). His non-fiction works, including The Road to Wigan Pier (1937), documenting his experience of working-class life in the industrial north of England, and Homage to Catalonia (1938), an account of his experiences soldiering for the Republican faction of the Spanish Civil War (1936–1939), are as critically respected as his essays on politics and literature, language and culture.', 0),
(10, 'Friedrich', 'Nietzsche', 'Friedrich Wilhelm Nietzsche (15 October 1844 – 25 August 1900) was a German philosopher, cultural critic and philologist whose work has exerted a profound influence on modern intellectual history. He began his career as a classical philologist before turning to philosophy. He became the youngest person ever to hold the Chair of Classical Philology at the University of Basel in 1869 at the age of 24.', 0),
(11, 'Stephen', 'King', 'Stephen Edwin King (born September 21, 1947) is an American author of horror, supernatural fiction, suspense, crime, science-fiction, and fantasy novels. Described as the \"King of Horror\", a play on his surname and a reference to his high standing in pop culture, his books have sold more than 350 million copies, and many have been adapted into films, television series, miniseries, and comic books. King has published 64 novels, including seven under the pen name Richard Bachman, and five non-fiction books. He has also written approximately 200 short stories, most of which have been published in book collections.', 0),
(12, 'James', 'Baraz', 'James Baraz is a founding teacher at the Spirit Rock Meditation Center, coauthor of Awakening Joy, a book that outlines happiness practices for adults. His immensely popular live and online course, Awakening Joy, has reached thousands of students since its inception in 2003.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date_of_issue` date NOT NULL,
  `number_of_pages` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `date_of_issue`, `number_of_pages`, `cover`, `category_id`, `description`, `is_deleted`) VALUES
(1, 'Dune', 1, '1965-08-01', 412, 'https://hodderscape.co.uk/wp-content/uploads/2015/02/Du.jpeg', 3, 'Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the “spice” melange, a drug capable of extending life and enhancing consciousness. Coveted across the known universe, melange is a prize worth killing for... When House Atreides is betrayed, the destruction of Paul’s family will set the boy on a journey toward a destiny greater than he could ever have imagined. And as he evolves into the mysterious man known as Muad’Dib, he will bring to fruition humankind’s most ancient and unattainable dream.', 0),
(2, 'Deep Work', 2, '2016-01-05', 304, 'https://miro.medium.com/max/680/1*KL67NUR5iyhggxTqzVQg5A.jpeg', 4, 'One of the most valuable skills in our economy is becoming increasingly rare. If you master this skill, you\'ll achieve extraordinary results. Deep work is the ability to focus without distraction on a cognitively demanding task. It\'s a skill that allows you to quickly master complicated information and produce better results in less time. Deep work will make you better at what you do and provide the sense of true fulfillment that comes from craftsmanship. In short, deep work is like a super power in our increasingly competitive twenty-first century economy. And yet, most people have lost the ability to go deep-spending their days instead in a frantic blur of e-mail and social media, not even realizing there\'s a better way.\nIn DEEP WORK, author and professor Cal Newport flips the narrative on impact in a connected age. Instead of arguing distraction is bad, he instead celebrates the power of its opposite. Dividing this book into two parts, he first makes the case that in almost any profession, cultivating a deep work ethic will produce massive benefits. He then presents a rigorous training regimen, presented as a series of four \"rules,\" for transforming your mind and habits to support this skill. A mix of cultural criticism and actionable advice, DEEP WORK takes the reader on a journey through memorable stories -- from Carl Jung building a stone tower in the woods to focus his mind, to a social media pioneer buying a round-trip business class ticket to Tokyo to write a book free from distraction in the air -- and no-nonsense advice, such as the claim that most serious professionals should quit social media and that you should practice being bored. DEEP WORK is an indispensable guide to anyone seeking focused success in a distracted world. ', 0),
(3, 'Alibaba: The House That Jack Ma Built', 3, '2016-03-12', 410, 'https://m.media-amazon.com/images/I/41GIQ4K-V1L.jpg', 5, 'In just a decade and half Jack Ma, a man who rose from humble beginnings and started his career as an English teacher, founded and built Alibaba into the second largest Internet company in the world. The company’s $25 billion IPO in 2014 was the world’s largest, valuing the company more than Facebook or Coca Cola. Alibaba today runs the e-commerce services that hundreds of millions of Chinese consumers depend on every day, providing employment and income for tens of millions more. A Rockefeller of his age, Jack has become an icon for the country’s booming private sector, and as the face of the new, consumerist China is courted by heads of state and CEOs from around the world.\n\nGranted unprecedented access to a wealth of new material including exclusive interviews, Clark draws on his own first-hand experience of key figures integral to Alibaba’s rise to create an authoritative, compelling narrative account of how Alibaba and its charismatic creator have transformed the way that Chinese exercise their new found economic freedom, inspiring entrepreneurs around the world and infuriating others, turning the tables on the Silicon Valley giants who have tried to stand in his way.', 0),
(4, 'Mindset: The New Psychology of Success', 4, '2008-02-28', 320, 'https://m.media-amazon.com/images/I/41vS70Qo3rL.jpg', 4, 'From the renowned psychologist who introduced the world to “growth mindset” comes this updated edition of the million-copy bestseller—featuring transformative insights into redefining success, building lifelong resilience, and supercharging self-improvement. After decades of research, world-renowned Stanford University psychologist Carol S. Dweck, Ph.D., discovered a simple but groundbreaking idea: the power of mindset. In this brilliant book, she shows how success in school, work, sports, the arts, and almost every area of human endeavor can be dramatically influenced by how we think about our talents and abilities. People with a fixed mindset—those who believe that abilities are fixed—are less likely to flourish than those with a growth mindset—those who believe that abilities can be developed. Mindset reveals how great parents, teachers, managers, and athletes can put this idea to use to foster outstanding accomplishment.  In this edition, Dweck offers new insights into her now famous and broadly embraced concept. She introduces a phenomenon she calls false growth mindset and guides people toward adopting a deeper, truer growth mindset. She also expands the mindset concept beyond the individual, applying it to the cultures of groups and organizations. With the right mindset, you can motivate those you lead, teach, and love—to transform their lives and your own.', 0),
(5, 'Why We Sleep: Unlocking the Power of Sleep and Dreams', 5, '2017-09-28', 368, 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781501144325/why-we-sleep-9781501144325_hr.jpg', 6, 'In this “compelling and utterly convincing” (The Sunday Times) book, preeminent neuroscientist and sleep expert Matthew Walker provides a revolutionary exploration of sleep, examining how it affects every aspect of our physical and mental well-being. Charting the most cutting-edge scientific breakthroughs, and marshalling his decades of research and clinical practice, Walker explains how we can harness sleep to improve learning, mood and energy levels, regulate hormones, prevent cancer, Alzheimer’s and diabetes, slow the effects of aging, and increase longevity. He also provides actionable steps towards getting a better night’s sleep every night.', 0),
(7, 'The Bell Jar', 6, '1963-01-13', 244, 'https://s26162.pcdn.co/wp-content/uploads/2018/01/395040.jpg', 3, 'In 1953, Esther Greenwood, a nineteen-year-old undergraduate student from the suburbs of Boston, is awarded a summer internship at the fictional Ladies\' Day magazine in New York City. During the internship, Esther feels neither stimulated nor excited by the work, fashion, and big-city lifestyle that her peers in the program seem to adore. She finds herself struggling to feel anything at all aside from anxiety and disorientation. Esther appreciates the witty sarcasm and adventurousness of another intern Doreen, but also identifies with the piety of Betsy, an old-fashioned and naïve young woman. Esther has a benefactress in Philomena Guinea, a formerly successful writer of women\'s fiction, who funds the scholarship through which Esther – from a working-class family – is enrolled at her college.', 0),
(8, 'Death on the Nile', 7, '1937-11-01', 288, 'https://images-na.ssl-images-amazon.com/images/I/71rrX1CZRlL.jpg', 7, 'While on holiday in Aswan to board the steamer Karnak, set to tour along the Nile River from Shellal to Wadi Halfa, Hercule Poirot is approached by successful socialite Linnet Doyle née Ridgeway. She wants to commission him to deter her former friend Jacqueline de Bellefort from hounding and stalking her. Linnet had recently married Jacqueline\'s ex-fiancé, Simon Doyle, which has made Jacqueline bitterly resentful. Poirot refuses the commission and unsuccessfully attempts to dissuade Jacqueline from pursuing her plans. Simon and Linnet secretly follow Poirot to escape Jacqueline but find she had learned of their plans and boarded ahead of them. The other Karnak passengers include Linnet\'s maid Louise Bourget; her trustee Andrew Pennington; romance novelist Salome Otterbourne and her daughter Rosalie; Tim Allerton and his mother; elderly American socialite Marie Van Schuyler, her cousin Cornelia Robson and her nurse Miss Bowers; outspoken communist Mr Ferguson; Italian archaeologist Guido Richetti; solicitor Jim Fanthorp; and Austrian physician Dr Bessner.', 0),
(9, 'The Notebook', 8, '1996-10-01', 214, 'https://nicholassparks.com/wp-content/uploads/1996/07/201612-notebook.jpg', 8, 'In 1940s South Carolina, mill worker Noah Calhoun and rich girl Allie are desperately in love. But her parents don\'t approve. When Noah goes off to serve in World War II, it seems to mark the end of their love affair. In the interim, Allie becomes involved with another man. But when Noah returns to their small town years later, on the cusp of Allie\'s marriage, it soon becomes clear that their romance is anything but over.', 0),
(10, '1984', 9, '1949-06-08', 328, 'https://i.ebayimg.com/images/g/pq8AAOSwOZRfGfTY/s-l640.jpg', 3, 'A man loses his identity while living under a repressive regime. In a story based on George Orwell\'s classic novel, Winston Smith is a government employee whose job involves the rewriting of history in a manner that casts his fictional country\'s leaders in a charitable light. His trysts with Julia provide his only measure of enjoyment, but lawmakers frown on the relationship -- and in this closely monitored society, there is no escape from Big Brother.', 0),
(11, 'Thus Spoke Zarathustra', 10, '1883-01-01', 342, 'https://kbimages1-a.akamaihd.net/578c8c5d-6e24-46bb-8e6b-5cba78046d67/1200/1200/False/thus-spoke-zarathustra-barnes-noble-signature-editions.jpg', 10, 'The novel opens with Zarathustra descending from his cave in the mountains after ten years of solitude. He is brimming with wisdom and love, and wants to teach humanity about the overman. He arrives in the town of the Motley Cow, and announces that the overman must be the meaning of the earth.', 0),
(12, 'Pet Sematary', 11, '1983-11-14', 373, 'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F6%2F2019%2F04%2F02%2Fpet-sematary-2000.jpg', 11, 'Louis Creed, a doctor from Chicago, moves to Ludlow, Maine with his family: wife Rachel; their two young children, Eileen (\"Ellie\") and Gage; and Ellie\'s cat, Winston Church. Their new house is just outside Ludlow. Their neighbor, an elderly man named Jud Crandall, warns Louis and Rachel about the highway that runs past their house; it is used by semi-trucks that come mostly from a nearby chemical plant that often pass by at high speeds.', 0),
(13, 'Awakening Joy: 10 steps to Happiness', 12, '2012-11-15', 294, 'https://ik.imagekit.io/next/books/1654703283_FjWg5Lr76.jpg', 6, 'Awakening Joy is more than just another book about happiness. More than simply offering suggested strategies to change our behavior, it uses time-tested practices to train the mind to learn new ways of thinking. The principles of the course are universal, although much of the material includes Buddhist philosophy drawn from the author’s thirty years as a Buddhist meditation teacher and spiritual counselor.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_notes`
--

CREATE TABLE `book_notes` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_notes`
--

INSERT INTO `book_notes` (`id`, `book_id`, `user_id`, `note`, `created_at`) VALUES
(1, 1, 25, 'example note', '2022-06-12 23:16:40'),
(2, 1, 25, 'another note', '2022-06-12 23:26:15'),
(3, 2, 25, 'example note', '2022-06-13 01:03:20'),
(4, 2, 25, 'another note', '2022-06-13 01:03:23'),
(9, 2, 24, 'example note edit', '2022-06-13 19:53:58'),
(11, 1, 24, 'more example notes', '2022-06-14 14:54:53'),
(12, 1, 24, 'a few more', '2022-06-14 14:55:00'),
(13, 7, 24, 'on page 132...', '2022-06-14 15:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `book_reviews`
--

CREATE TABLE `book_reviews` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_reviews`
--

INSERT INTO `book_reviews` (`id`, `book_id`, `user_id`, `review`, `created_at`, `is_approved`) VALUES
(1, 1, 24, 'Very interesting and fun book!', '2022-06-12 23:28:01', 1),
(4, 1, 25, 'I adore this book, it\'s a must read!', '2022-06-12 23:28:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_deleted`) VALUES
(3, 'Fiction', 0),
(4, 'Business', 0),
(5, 'Biographies', 0),
(6, 'Self-Help', 0),
(7, 'Mystery', 0),
(8, 'Romance', 0),
(10, 'Philosophy', 0),
(11, 'Horror', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'user'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `role_id`) VALUES
(24, 'John', 'Doe', 'johndoe', 'johndoe@example.com', '$2y$10$MTvY860NU.Dg5gFv1blyeOiwjY9/Q3lUKSDKPd.x1vt1AI38CzLRy', 2),
(25, 'Alice', 'Doe', 'alicedoe', 'alicedoe@example.com', '$2y$10$Xqh2Z5Y/4uZnoLBiolKXYeWPzOUnIwvcMXMF6T6gBWJjIBXzy4gYa', 1),
(26, 'Mark', 'Zuckerberg', 'markzuck12', 'markzuck12923112@gmail.com', '$2y$10$GgnYK4iG5Q16jDunhPExjO0/tB6Ypp/iN.qUeaBRgXrxKPLtq9II.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_notes`
--
ALTER TABLE `book_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_reviews_ibfk_1` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `book_notes`
--
ALTER TABLE `book_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `book_reviews`
--
ALTER TABLE `book_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `book_notes`
--
ALTER TABLE `book_notes`
  ADD CONSTRAINT `book_notes_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_notes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD CONSTRAINT `book_reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
