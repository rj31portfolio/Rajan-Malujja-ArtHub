-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2025 at 01:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artifyhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `main_image_2` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT 1,
  `status` enum('in_stock','sold_out','featured') DEFAULT 'in_stock',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `title`, `slug`, `category_id`, `price`, `description`, `meta_description`, `main_image`, `main_image_2`, `stock`, `status`, `created_at`) VALUES
(4, 'Portrait Painting', 'portrait-painting', 3, 1.00, '<h2>Most Reputed and Renowned Portrait Painting Artist in India</h2>\r\n\r\n<h2>About Rajan Maluuja Arts</h2>\r\n\r\n<p>Rajan Maluuja Arts is a well-known portrait painter in India. His love of the arts began early in life, and since then he has developed his talent to produce wonderful&nbsp;portraits that truly represent the core of his clients. His attention to detail, use of vibrant colors, and ability of capturing the personality and character of his subject distinguish his portraits. All these qualities make him one of the&nbsp;<strong>Best portrait artist in India</strong>.</p>\r\n\r\n<h3>Services Offered</h3>\r\n\r\n<p>Individual portraits, family portraits and&nbsp;pet photographs&nbsp;are all areas of expertise for Rajan Maluuja Arts. His portraits are renowned for their realistic detail and skill to convey his clients&#39; true personality. His family portraits convey the warmth and closeness between family members, while his individual portraits reflect the personality and character of the client. His pet portraits are famous for his careful consideration of detail and his ability to accurately portray each animal&#39;s own features and personality.</p>\r\n\r\n<p>Rajan Maluuja Arts in India also provides the service of portrait from photos. It is the best option for those who want the live portrait of themselves but cannot sit for long.</p>\r\n\r\n<p>Why Rajan Maluuja is the Best Portrait Artist in India</p>\r\n\r\n<p>There are many reasons why Rajan Maluuja is considered as the&nbsp;<strong>Best Portrait Artist in India</strong>. These include:</p>\r\n\r\n<p><strong>Exceptional Talent:</strong><br />\r\nRajan Maluuja is an&nbsp;extraordinarily gifted artist with a sharp eye for detail. His portraits are recognized by his use of brilliant colour, natural detail, and ability to convey the character and individuality of his clients.</p>\r\n\r\n<p><strong>A focus on detail</strong><br />\r\nRajan Maluuja pays close attention to the little things to make each portrait he paints a work of art. He carefully and accurately catches every detail, from the little hairs on a pet to the distinctive features on a person&#39;s face.</p>\r\n\r\n<p><strong>Customized Approach</strong><br />\r\nIn order to completely understand his clients&#39; needs and preferences, Rajan Maluuja spends time listening&nbsp;their stories and works closely with them. This enables him to paint portraits of individuals that not only capture their physical features but also their traits and personalities.</p>\r\n\r\n<p><strong>Experienced Individual:</strong><br />\r\nRajan Maluuja has more than 15 years of professional experience, has perfected his craft, and has made a name for himself as one of the most in-demand&nbsp;<strong>Best Portrait Artist in India</strong>. Every portrait that&nbsp;he makes&nbsp;is a masterpiece thanks to his experience and knowledge in the field.</p>\r\n', 'Rajan Maluuja, a portrait artist with more than 15 years of expertise, has made a name for himself as one of the India\'s most gifted and in-demand artists. He is the best because of his extraordinary talent, keen eye for detail, and capacity to capture the soul of his subjects.', 'arts/6821d2ffaaf95_1.jpg', 'arts/6821d2ffac6e9_2.jpg', 3, 'in_stock', '2025-05-12 10:52:47'),
(6, 'Certified and Professional Sketch Artist in Delhi NCR', 'certified-and-professional-sketch-artist-in-delhi-ncr', 4, 0.00, '<p>Rajan Maluuja is one of the&nbsp;<strong>Best Sketch Artist in Delhi NCR</strong>. He is known as one of the most talented artists in the Delhi NCR due to his excellent abilities, unique style, and dedication to detail. His efforts to achieve perfection and his love of art are visible in his work. Rajan Maluuja is the artist to choose if you want a sketch that perfectly captures the soul of your loved one.</p>\r\n\r\n<p>Sketching is a skill that demands accuracy, patience and lots of skill. There are many brilliant sketch artists in Delhi NCR, but Rajan Maluuja Arts stands out from the rest. Due to his distinctive style and superior abilities he has established a reputation as the&nbsp;<strong>Best Sketch Artist in Delhi NCR</strong>.</p>\r\n\r\n<h2>About</h2>\r\n\r\n<p>Rajan Maluuja is self-taught Sketch artist. Since he was a young child, he has been enthusiastic about art and has spent years refining his talent. He effortlessly captures the soul of the matter in his sketches, which are extremely realistic and precise. His unusual differentiates him from other artists and this has helped him to build a strong following of art enthusiasts.</p>\r\n\r\n<p><strong>Sketching excellence</strong>: Rajan Maluuja is recognized for his amazing talent for sketching human portraits. His ability to capture the soul of the subject matter and bring it to life on paper is a natural skill. His sketches are extremely accurate and detailed, capturing all of the individual&#39;s features and emotions. He spends hours refining each element with unmatched attention to detail. With his adaptability and the talent he pursue, he is one of the&nbsp;<strong>Best Sketch Artist in Delhi NCR</strong>.</p>\r\n\r\n<p><strong>Exhibitions &amp; Awards:&nbsp;</strong>Rajan Maluuja has taken part in a number of exhibitions and has received a great deal of recognition for his work. His sketches have been displayed in a number of galleries all across Delhi and NCR, and he has won praise from both art enthusiasts and critics. His art has received recognition for its originality, dedication to detail, and distinctive style and has been featured in numerous magazines.</p>\r\n\r\n<p><strong>Commissioned Work:&nbsp;</strong>Clients who desire a sketch of their loved ones may also order work from Rajan Maluuja. His clients consist of families, individuals and even some famous personalities. He takes the time to fully understand the needs and tastes of the client before creating sketches that are beyond their expectations. He is one of Best Sketch Artist in Delhi NCR because of his ability at capturing the soul of the matter and bringing it to life on paper.</p>\r\n', 'Rajan Maluuja is one of the Best Sketch Artist in Delhi NCR. He is known as one of the most talented artists in the Delhi NCR due to his excellent abilities, unique style, and dedication to detail. His efforts to achieve perfection and his love of art are visible in his work. Rajan Maluuja is the artist to choose if you want a sketch that perfectly captures the soul of your loved one.', 'arts/68285c80bf517_2.png', 'arts/68285c80bf825_1.jpg', 1, 'in_stock', '2025-05-17 09:53:04'),
(7, 'Professional and Expert Illustration Drawing Artist in Delhi', 'professional-and-expert-illustration-drawing-artist-in-delhi', 6, 0.00, '<p>Rajan Maluuja Arts is the leading&nbsp;<strong>Illustration drawing artist in Delhi</strong>. He has a distinct style and extraordinary talent, which have brought him fame and praise from both art lovers and professionals. One of the most sought-after painters in the city, he is known for his ability to bring imagination to life, distinctive style, and command of both conventional and digital techniques. Rajan Maluuja Arts is the ideal option if you&#39;re searching for an&nbsp;<strong>illustration drawing artist in Delhi</strong>&nbsp;who can produce images that are both attractive and significant. He has been polishing his skill for more than 15 years and has made a name for himself as one of the city&#39;s most gifted and in-demand portrait painters</p>\r\n\r\n<p>Illustration Drawing involves a certain set of abilities, such as originality, focus on detail, and the capacity to visually communicate feelings and ideas. Despite the fact that Delhi is home to many excellent painters, Rajan Maluuja Arts stands out as&nbsp;<strong>best Illustration drawing artist in Delhi</strong>.</p>\r\n\r\n<h2>Realizing the Imagination</h2>\r\n\r\n<p>The ability to bring imagination to life is one of Rajan Maluuja Arts&#39; unique artistic qualities. Rajan Maluuja Arts always produces illustrations that are original and interesting, whether he is working on a book for children, a company brochure, or a personal request. His use of strong lines, vivid colors, and minute details gives his work an additional dimension of richness and depth.</p>\r\n\r\n<h3>A Unique Style and Technique</h3>\r\n\r\n<p>Unlike other&nbsp;<strong>illustration drawing artists in Delhi</strong>, Rajan Maluuja Arts has a distinctive style that makes him stand out. He is able to produce illustrations that are both classic and contemporary by combining traditional and digital methods. He combines his skill and strong eye for detail to produce images that are both stunning and intense.</p>\r\n', 'Rajan Maluuja Arts is the leading Illustration drawing artist in Delhi. He has a distinct style and extraordinary talent, which have brought him fame and praise from both art lovers and professionals. One of the most sought-after painters in the city, he is known for his ability to bring imagination to life, distinctive style, and command of both conventional and digital techniques. Rajan Maluuja Arts is the ideal option if you\'re searching for an illustration drawing artist in Delhi who can produce images that are both attractive and significant. He has been polishing his skill for more than 15 years and has made a name for himself as one of the city\'s most gifted and in-demand portrait painters', 'arts/68285db199d6a_1.jpg', 'arts/68285db199fa6_2.png', 0, 'in_stock', '2025-05-17 09:58:09'),
(8, 'Army Portrait', 'army-portrait', 10, 0.00, '<h1>Army Portrait</h1>\r\n\r\n<p>Indian No. #1&nbsp;<strong>Army Portrait</strong>&nbsp;| National Army Painting Artist is located in Paschim Vihar, Delhi. Where he displays various paintings on different subjects. Some of his famous clients for whom he painted, include Shikhar Dhawan, Manoj Tiwari, Vice president of India, Chief Minister of Bihar, General V.K. Singh, TV anchor Rajeev Sardesai, Owner of Jindal Company Naveen Jindal and his mother Savitri Jindal, Arun Jetli, Meenakshi Lekhi, Maharaj Adjvesha Nand Giri Ji . H. H. Jaipur Padmnabh Singh. and other renowned business families. He has exhibited his art in Galleries such as East of Kailash, Nehru palace in 2015, and in JW Marriot in 2014. In Iskon Temple in 2006.</p>\r\n', 'Indian No. #1 Army Portrait | National Army Painting Artist is located in Paschim Vihar, Delhi. Where he displays various paintings on different subjects. Some of his famous clients for whom he painted, include Shikhar Dhawan, Manoj Tiwari, Vice president of India, Chief Minister of Bihar, General V.K. Singh, TV anchor Rajeev Sardesai, Owner of Jindal Company Naveen Jindal and his mother Savitri Jindal, Arun Jetli, Meenakshi Lekhi, Maharaj Adjvesha Nand Giri Ji . H. H. Jaipur Padmnabh Singh. and other renowned business families. He has exhibited his art in Galleries such as East of Kailash, Nehru palace in 2015, and in JW Marriot in 2014. In Iskon Temple in 2006.', 'arts/68285fb648347_1.jpg', 'arts/68285fb64865b_2.png', 1, 'in_stock', '2025-05-17 10:06:46'),
(9, 'Highly Admired Tanjore Painting Artist in Delhi', 'highly-admired-tanjore-painting-artist-in-delhi', 8, 0.00, '<p>One of the few skilled&nbsp;<strong>Tanjore painting artist in Delhi</strong>&nbsp;who has been preserving this art style is Rajan Maluuja. Rajan Maluuja Arts has been making significant contributions to preserving the history of Tanjore painting in Delhi and ensuring that it thrives. The gallery has contributed to increasing awareness of this distinctive art form and developing a market for&nbsp;<strong>Tanjore painting artists in Delhi</strong>&nbsp;by presenting the works of these gifted artists.</p>\r\n\r\n<p>Rajan Maluuja Arts has been promoting both traditional and modern works of art by well-known artists. Recently, the gallery has been displaying Tanjore painting, a distinctive and complex art form that has its roots in Thanjavur (Tanjore), Tamil Nadu.</p>\r\n\r\n<h2>Preserving the Art of Tanjore Painting in Delhi</h2>\r\n\r\n<p>Tanjore paintings are renowned for their intense tones, minute details, and use of precious ornaments. Bold shapes and vivid colors characterised these paintings, which generally depict Hindu deities, historical moments, or mythological tales. The art form, which has a history dating back to the 16th century, has developed into a distinct and highly regarded art form.</p>\r\n\r\n<p>Although though Delhi is not traditionally linked with Tanjore painting, there are a few gifted artists in the city who have been preserving this art form. These artists have years of experience and have received training in the traditional Tanjore painting methods. They have been producing gorgeous paintings that show a variety of themes and are valued by the art world.</p>\r\n\r\n<h3>Challenges of Practicing Tanjore Painting in Delhi</h3>\r\n\r\n<p>The lack of knowledge about Tanjore painting is one of the major challenges for its practitioners in Delhi. Many people are not aware with Tanjore painting and are not aware of its rich history and cultural significance because it is not normally connected with Delhi.&nbsp;<strong>Tanjore painting artists in Delhi</strong>&nbsp;struggle to receive the attention they deserve due to this ignorance.</p>\r\n\r\n<p>Rajan Maluuja Arts - Promoting the Legacy of Tanjore Painting in Delhi</p>\r\n\r\n<p>In Delhi, Rajan Maluuja Arts has been vital in preserving the history of Tanjore painting. Talented&nbsp;<strong>Tanjore painting artists in Delhi</strong>&nbsp;have been showing their works at the art gallery, helping to spread the word about this distinctive kind of painting.</p>\r\n\r\n<p>Rajan Maluuja Arts has been working to preserve the history of Tanjore painting in Delhi and make sure that it is a thriving art form. The gallery has also been giving art lover the chance to enjoy and collect these wonderful paintings, assisting in the development of a Delhi market for Tanjore painting artists.</p>\r\n', 'Rajan Maluuja Arts has been promoting both traditional and modern works of art by well-known artists. Recently, the gallery has been displaying Tanjore painting, a distinctive and complex art form that has its roots in Thanjavur (Tanjore), Tamil Nadu.', 'arts/682865988cb7e_1.jpg', 'arts/682865988ec62_2.png', 1, 'in_stock', '2025-05-17 10:31:52'),
(10, 'One of The Best and Well Known Sculpture Artist in Delhi NCR', 'one-of-the-best-and-well-known-sculpture-artist-in-delhi-ncr', 9, 0.00, '<p>Rajan Maluuja is considered as one of the&nbsp;<strong>Best Sculpture Artist in Delhi</strong>. With his unique talent and extraordinary skill, he has made a name for himself in the sculpture art world. Rajan Maluuja Sculpture is in high demand because of his ability to bring life to the sculptures with his skills and accuracy. Rajan Maluuja uses unique and stunning materials to create sculptures that are beautifully designed and skillfully constructed. His works of art has a distinct aesthetic, and the sculptures he makes are often distinguished by their minute details and attention to design. Rajan Maluuja&#39;s other art works are equally well-regarded, and his sculptures have been exhibited in a number of major exhibitions and art galleries across Delhi. His sculptures are renowned for their energetic and emotive representations. In his Sculptures he frequently features animals, mythological creatures and human beings.</p>\r\n\r\n<h2>Challenges Faced by Sculpture Artist in Delhi</h2>\r\n\r\n<p>Although sculpture has become an increasingly popular art form, Delhi&#39;s sculpture artists still face a lot of challenges. Lack of government support for the arts is one of the main issues. This makes it challenging for artists to acquire the resources and assistance they require to produce and display their creations. The absence of knowledge regarding sculpture as an art form presents another difficulty for Delhi sculpture artists. The rich history and cultural significance of sculpture are not well known to many people. Because of this, it is challenging for sculpting artists to receive the respect and admiration they merit.</p>\r\n\r\n<h3>Rajan Maluuja Arts - Promoting Sculpture Art in Delhi</h3>\r\n\r\n<p>Sculpture art in Delhi has been actively promoted by Rajan Maluuja Arts. The art gallery has been exhibiting the creations of Delhi&#39;s top sculpture creators, thereby increasing awareness of this distinctive form of art. The gallery has also been collaborating with these artists to give them the platform and encouragement they need to keep creating art. Rajan Maluuja Arts has been working to protect the history of sculpting art in Delhi and make sure that it is a flourishing art form. Also, the gallery has been giving art lovers the chance to admire and acquire these wonderful sculptures, assisting in the development of a market for best sculpture artist in Delhi. With his skills and amount of experience in the field of art Rajan Maluuja is one of the&nbsp;<strong>Best Sculpture artist in Delhi</strong>. His talent in the field of Art has given him a well-deserved spot among the most renowned and respected artists in the Delhi.</p>\r\n', 'Rajan Maluuja is considered as one of the Best Sculpture Artist in Delhi. With his unique talent and extraordinary skill, he has made a name for himself in the sculpture art world. Rajan Maluuja Sculpture is in high demand because of his ability to bring life to the sculptures with his skills and accuracy.', 'arts/68286606958b7_1.jpg', 'arts/68286606970e9_2.png', 1, 'in_stock', '2025-05-17 10:33:42'),
(11, 'Well Established Relief Artwork Artist in Delhi', 'well-established-relief-artwork-artist-in-delhi', 11, 0.00, '<p>Rajan Maluuja is an established&nbsp;<strong>Relief artwork artist in Delhi</strong>&nbsp;who has developed a huge supporter base with to his talent and skill. A special kind of sculpture known as relief art includes carving or sculpting a design into a flat surface to produce the art that looks like a three-dimensional image. Maluuja uses a lot of detail in his relief artwork, and his use of grain and shadows results in spectacular visual effects.</p>\r\n\r\n<p>His work keeps inspiring and surprise people who see it, and his contribution to the field of relief art has established him as a renowned figure in the Delhi art world as one of the skilled&nbsp;<strong>Relief Artwork artist in Delhi</strong>.</p>\r\n\r\n<h2>What is Relief Artwork?</h2>\r\n\r\n<p>Relief Artwork is a Sculpture technique in which a design is carved or molded onto a flat surface to produce a three-dimensional image. The surface on which the art has to formed can be created from a variety of substances, including wood, metal and stone, and it can range in thickness from shallow to deep. Low relief, High relief and sunken relief are the three categories of relief art. Sunken relief is when the design is carved into the surface, making it lower than the surrounding region. High relief is when the design is raised significantly higher from the background. Low relief is when the design is just slightly raised.</p>\r\n\r\n<h3>Innovative Methods</h3>\r\n\r\n<p>Maluuja&#39;s unique approach to tools and techniques is visible in all of his works of art. He works with a variety of materials, including as metal, stone and wood. In order to add some dimension and texture to his relief paintings, he also employs a range of tools, such as chisels, knives, and hammers.</p>\r\n\r\n<p>Themes and Inspiration</p>\r\n\r\n<p>Rajan Maluuja frequently draws inspiration from the natural world for his relief artwork, and many of his works feature landscapes, animals, plants and other natural objects. His artwork also has a deep influence of mythology and historical themes, and he frequently produces such works which showcase these themes.</p>\r\n', 'Rajan Maluuja is an established Relief artwork artist in Delhi who has developed a huge supporter base with to his talent and skill. A special kind of sculpture known as relief art includes carving or sculpting a design into a flat surface to produce the art that looks like a three-dimensional image. Maluuja uses a lot of detail in his relief artwork, and his use of grain and shadows results in spectacular visual effects.', 'arts/6828666f27f7c_2.png', 'arts/6828666f29c27_1.jpg', 1, 'in_stock', '2025-05-17 10:35:27'),
(12, 'Highly Reputable Handmade Caricature Artist in Delhi', 'highly-reputable-handmade-caricature-artist-in-delhi', 12, 0.00, '<p>Rajan Maluuja is a highly talented&nbsp;<strong>Handmade Caricature artist in Delhi</strong>, whose distinctive and innovative artwork has grabbed the attention of many. His usage of creative techniques and unique style has made his caricatures widely known and are in high demand. Maluuja&#39;s hand-drawn caricatures are a testimony to the elegance and brilliance of caricature art, and he has made immense contributions to Delhi&#39;s handmade caricature field. His creations are a great testament to his talent, and the world of art has recognised him for his commitment to this field.</p>\r\n\r\n<p>Rajan Maluuja is a well-known&nbsp;<strong>Handmade Caricature artist in Delhi</strong>&nbsp;who is known for creating or sculpting enlarged representations of humans or animals with funny or satirical elements is the art form known as handmade caricatures. Rajan Maluuja creates exquisite hand-drawn caricatures that frequently capture the soul of the object in a unique way.</p>\r\n\r\n<h2>What is Handmade Caricature?</h2>\r\n\r\n<p>Handmade caricature is an art of representing elaborated and sometimes humorous portraits of people or animals. The artist who creates a caricature uses his talent to portray the unique features and personality of its clients, often highlighting some particular features to produce a hilarious result. Caricatures created by hand can be drawn or sculpted using a variety of mediums, including clay, paper, or wood. Maluuja&#39;s Handmade Caricatures</p>\r\n\r\n<p>The handmade caricatures created by Rajan Maluuja are unique, precise, and effectively capture the soul of his subjects. His pieces are made from a variety of materials, including clay, paper, and wood. Maluuja&#39;s caricatures usually include a wide range of subjects, from well-known celebrities to regular individuals, and he has a talent of expressing their personalities and distinctive features in a humorous and inflated style which makes him one of the best&nbsp;<strong>Handmade Caricature artists in Delhi</strong>.</p>\r\n\r\n<h3>Efforts and Style</h3>\r\n\r\n<p>Maluuja&#39;s handmade caricature artwork is known for his unique technique and style. He creates his art using a various methods which includes molding, sculpting, and painting. His skill to accurately depict his clients&#39; distinctive facial expressions and body language makes it more exciting and funny.</p>\r\n', 'Rajan Maluuja is a highly talented Handmade Caricature artist in Delhi, whose distinctive and innovative artwork has grabbed the attention of many. His usage of creative techniques and unique style has made his caricatures widely known and are in high demand.', 'arts/682866c189b36_2.png', 'arts/682866c18af33_1.jpg', 1, 'in_stock', '2025-05-17 10:36:49'),
(13, 'Recognised and Best Pencil Sketch Artist in Delhi NCR', 'recognised-and-best-pencil-sketch-artist-in-delhi-ncr', 13, 0.00, '<p>Rajan Maluuja is a highly skilled&nbsp;<strong>Pencil Sketch Artist in Delhi</strong>, whose amazing artwork has received love from many people. His uses innovative techniques and unique style to make his pencil sketches highly recognizable and always in demand. Maluuja&#39;s pencil sketches are a representation to the beauty and natural feel, and his contribution to the field of Pencil Sketch art in Delhi is invaluable. His artwork is a true reflection of his talent, and his dedication for his craft which has also earned him recognition in the art community.</p>\r\n\r\n<p>Rajan Maluuja is a highly talented and well-known&nbsp;<strong>Pencil Sketch artist in Delhi</strong>&nbsp;whose wonderful artwork has established a special place for itself. The delicate craft of pencil sketching calls for accuracy, dedication, and a high level of talent. Maluuja creates complex, unique pencil sketches that genuinely depict his clients&#39; souls.</p>\r\n\r\n<h2>The Art of Pencil Sketching</h2>\r\n\r\n<p>Sketches that are extremely detailed and realistic are produced through the art of pencil sketching. To add depth and complexity to the drawings, the artist employs a variety of methods, including shading, carving, and smudging. Pencil sketching is a delicate art form that may produce incredibly stunning results with practice, accuracy, and skill.</p>\r\n\r\n<h3>Maluuja&#39;s Pencil Sketches</h3>\r\n\r\n<p>The realistic and very detailed pencil sketches by Rajan Maluuja accurately depict the client&#39;s true personality. He uses a wide range of methods, including shading and chiseling, to add depth to his drawings. Rajan Maluuja frequently portrays a variety of customers, from well-known celebrities to common people in his sketches, and he specializes in accurately capturing their distinct physical features.</p>\r\n\r\n<p>Techniques and Style</p>\r\n\r\n<p>Maluuja&#39;s pencil sketches are recognized by their original styles and cutting-edge methods. He employs a variety of methods, including shading, chiseling, and stippling, to add texture as well as depth to his drawings. His sketches are more realistic and appealing altogether because of his skill at capturing the distinct faces and gestures of his subjects.</p>\r\n\r\n<p>Commissioned Work</p>\r\n\r\n<p>Rajan Maluuja also provide commissioned work for those who need a customised and one-of-a-kind pencil sketch of themselves or a loved one. He has established a solid reputation as a skilled and gifted&nbsp;<strong>Pencil sketch artist in Delhi</strong>, Which has made his commission work very popular. Customers have a variety of designs and mediums to pick from, and Maluuja works closely with each one to ensure that they are fully satisfied.</p>\r\n', 'Rajan Maluuja is a highly skilled Pencil Sketch Artist in Delhi, whose amazing artwork has received love from many people. His uses innovative techniques and unique style to make his pencil sketches highly recognizable and always in demand. Maluuja\'s pencil sketches are a representation to the beauty and natural feel, and his contribution to the field of Pencil Sketch art in Delhi is invaluable.', 'arts/682867b362005_1678961681.jpg', 'arts/682867b363aeb_1.jpg', 1, 'in_stock', '2025-05-17 10:40:51'),
(14, 'Top Rated and Finest Wall Art Artist in Delhi NCR', 'top-rated-and-finest-wall-art-artist-in-delhi-ncr', 14, 0.00, '<p>Rajan Maluuja Arts is the perfect choice if you&#39;re looking for the&nbsp;<strong>Best Wall Art artist in Delhi NCR</strong>. Rajan Maluuja can turn any place into a piece of art with their cutting-edge methods, unique designs, and unmatched experience.</p>\r\n\r\n<p>One of the top&nbsp;<strong>Wall Art artist in Delhi NCR</strong>&nbsp;is Rajan Maluuja Arts. Mr. Rajan Maluuja, a talented artist who has won praise for his outstanding wall art designs.</p>\r\n\r\n<h2>A Heaven for Artist Who Love Wall Art: Rajan Maluuja Arts</h2>\r\n\r\n<p>For those who adore wall art and are searching for one-of-a-kind, creative pieces that may turn their homes into havens of creativity, Rajan Maluuja Arts is kind of heaven for them. Rajan Maluuja Arts has a wall art solution for every need whether it&#39;s for home to business spaces. Rajan Maluuja Arts offers a variety of possibilities, including murals, graffiti art, and 3D art.</p>\r\n\r\n<h3>Creative Wall Art Techniques</h3>\r\n\r\n<p>The creative wall art techniques used by Rajan Maluuja Arts are known for bringing life to the walls. Spray paint, stencils, acrylics, and other mediums are just a few of the things used by the artists of Rajan Maluuja Arts to produce their works of art. They also specialize in creating stunning wall art through 3D techniques.</p>\r\n\r\n<p>Customized Wall Art Designs</p>\r\n\r\n<p>Every piece of wall art made by Rajan Maluuja Arts is special and customized to satisfy each client&#39;s individual needs. Rajan Maluuja Arts work closely with the client to realise their vision, whether it is a particular colour scheme, style, or topic. To assist customers in selecting the ideal wall art selections for their location, they also provide on-site consultations.</p>\r\n\r\n<p>Knowledge and Skills</p>\r\n\r\n<p>Rajan Maluuja has been producing wall artwork for years. They can create designs that are both visually stunning and long-lasting because of their proficiency in a variety of wall art techniques. With these knowledge and skills Rajan Maluuja is considered one of the Best&nbsp;<strong>Wall Art artist in Delhi</strong>.</p>\r\n', 'Rajan Maluuja Arts is the perfect choice if you\'re looking for the Best Wall Art artist in Delhi NCR. Rajan Maluuja can turn any place into a piece of art with their cutting-edge methods, unique designs, and unmatched experience.', 'arts/68286d6f3f8d0_2.png', 'arts/68286d6f41299_1.jpg', 1, 'in_stock', '2025-05-17 11:05:19'),
(15, 'Get The Best and Professional Charcoal Sketch Artist in Delhi', 'get-the-best-and-professional-charcoal-sketch-artist-in-delhi', 5, 0.00, '<p>Rajan Maluuja is the&nbsp;<strong>Best Charcoal Sketch Artist in Delhi</strong>. His distinctive aesthetic and outstanding talent has brought him attention and awards from both art enthusiasts and critics. His extraordinary talent as an artist is evident by his capacity to portray the soul of his clients with such accuracy which is possible due to his incredible attention to detail, texture, and complexity. Rajan Maluuja is the go-to artist if you want a charcoal sketch artist that can produce absolutely remarkable work.</p>\r\n\r\n<h2>Early Life &amp; Background</h2>\r\n\r\n<p>Rajan Maluuja discovered his love of art at a very young age. He improved his skills by participating in a variety of art classes and exhibitions and studying under some of the top national painters. He began his career as a charcoal sketch artist and swiftly became well-known for his unique approach and extraordinary talent.</p>\r\n\r\n<h3>Artistic Style &amp; Technique</h3>\r\n\r\n<p>Charcoal sketches by Rajan Maluuja are recognized for their extraordinary depth of color, smoothness, and detail. Using charcoal pencils to make detailed lines and shadows that give his sketches life, he accurately captures the soul of his subjects. He combines his skill and sharp eye for detail to produce remarkably lifelike portraits that reflect the subject&#39;s character and feelings. His talent and technique makes him the&nbsp;<strong>Best charcoal sketch artist in Delhi</strong>.</p>\r\n\r\n<p>Achievements &amp; Recognition</p>\r\n\r\n<p>As a Charcoal sketch artist Rajan Maluuja has received several honors throughout the years for his exceptional work. He has taken part in many art contests and shows and has received a number awards for his extraordinary talent and distinctive style. His work which has been displayed at various prestigious art galleries has been appreciated art lovers and critics. Rajan Maluuja has been given the opportunity to take part in a number of important art events and has won praise from critics for his contributions to the field of art.</p>\r\n', 'Rajan Maluuja is the Best Charcoal Sketch Artist in Delhi. His distinctive aesthetic and outstanding talent has brought him attention and awards from both art enthusiasts and critics. His extraordinary talent as an artist is evident by his capacity to portray the soul of his clients with such accuracy which is possible due to his incredible attention to detail, texture, and complexity. Rajan Maluuja is the go-to artist if you want a charcoal sketch artist that can produce absolutely remarkable work.', 'arts/68286e6e44fd3_2.png', 'arts/68286e6e469d7_1.jpg', 1, 'in_stock', '2025-05-17 11:09:34'),
(16, 'Renowned and Finest Couple Portrait Painting Artist in Delhi', 'renowned-and-finest-couple-portrait-painting-artist-in-delhi', 15, 0.00, '<p>Rajan Maluuja Arts is a renowned&nbsp;<strong>Couple portrait painting artist in Delhi&nbsp;</strong>awarded&nbsp;<strong>Bharat Gaurav Ratan</strong>&nbsp;by Government of India. He creates stunning couple portrait paintings that capture the very essence of love and chemistry. With the experience and the way he captures the small details in his painting, he is considered as one of the finest&nbsp;<strong>Couple portrait painting artists in Delhi</strong>.</p>\r\n\r\n<h2>Personalized Masterpieces</h2>\r\n\r\n<p>Rajan Maluuja Arts understands that every couple is a unique entity with their own distinct personalities and preferences. Thus, he works closely with couples to unravel their likes, dislikes, and interests. This profound understanding allows him to create bespoke masterpieces that not only mirror the couple&#39;s physical features but their very essence as individuals.</p>\r\n\r\n<h3>A Proficiency in Multiple Mediums</h3>\r\n\r\n<p>The talented Rajan Maluuja is expert in various mediums such as oil, watercolor, and acrylics. He uses his expertise in these mediums to create portraits that transcend time, evoking wonder for centuries to come. Every brushstroke is done with utmost precision, ensuring that every facet, from the couple&#39;s attire to the background, is a true reflection of their unique personalities.</p>\r\n\r\n<p>The Traditional and Contemporary Blend</p>\r\n\r\n<p>Rajan Maluuja Arts takes is proficient in creating portraits that are both traditional and contemporary. He blends traditional techniques with modern design elements to produce portraits that are striking, bold, and abstract. By mix of the old and the new, He can serve to the diverse preferences of their clients, creating a portrait that resonates with them.</p>\r\n\r\n<p>Achievements by Rajan Maluuja Arts</p>\r\n\r\n<p>Rajan Maluuja Arts has been Awarded a milestone&nbsp;<strong>Bharat Gaurav Ratan</strong>&nbsp;by the Government of India for its great art work and passion. Rajan Maluuja Arts is an excellent choice for couples searching for a portrait painting artist in Delhi. Rajan Maluuja&rsquo;s personalized approach, mastery of multiple mediums, attention to detail, and diverse portrait styles make him one of the best&nbsp;<strong>Couple portrait painting artists in Delhi.</strong></p>\r\n', 'Rajan Maluuja Arts is a renowned Couple portrait painting artist in Delhi awarded Bharat Gaurav Ratan by Government of India. He creates stunning couple portrait paintings that capture the very essence of love and chemistry. With the experience and the way he captures the small details in his painting, he is considered as one of the finest Couple portrait painting artists in Delhi.', 'arts/68286ed616692_1.jpg', 'arts/68286ed617c5f_2.png', 1, 'in_stock', '2025-05-17 11:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `art_images`
--

CREATE TABLE `art_images` (
  `id` int(11) NOT NULL,
  `art_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art_images`
--

INSERT INTO `art_images` (`id`, `art_id`, `image_path`, `created_at`) VALUES
(9, 8, 'arts/68285fb648d87_1.jpg', '2025-05-17 10:06:46'),
(10, 8, 'arts/68285fb649c82_2.jpg', '2025-05-17 10:06:46'),
(11, 8, 'arts/68285fb64a9f4_3.jpg', '2025-05-17 10:06:46'),
(12, 8, 'arts/68285fb64ad05_4.jpg', '2025-05-17 10:06:46'),
(13, 8, 'arts/68285fb64b158_5.jpg', '2025-05-17 10:06:46'),
(14, 8, 'arts/68285fb64b52f_6.jpg', '2025-05-17 10:06:46'),
(15, 8, 'arts/68285fb64b7ef_7.jpg', '2025-05-17 10:06:46'),
(16, 8, 'arts/68285fb64ba68_8.jpg', '2025-05-17 10:06:46'),
(17, 8, 'arts/68285fb64bca8_9.jpg', '2025-05-17 10:06:46'),
(18, 8, 'arts/68285fb64bf39_10.jpg', '2025-05-17 10:06:46'),
(19, 8, 'arts/68285fb64c1cf_11.jpg', '2025-05-17 10:06:46'),
(20, 8, 'arts/68285fb64c4ef_12.jpg', '2025-05-17 10:06:46'),
(21, 8, 'arts/68285fb64c73f_13.jpg', '2025-05-17 10:06:46'),
(22, 8, 'arts/68285fb64c973_14.jpg', '2025-05-17 10:06:46'),
(23, 8, 'arts/68285fb64cba1_15.jpg', '2025-05-17 10:06:46'),
(24, 8, 'arts/68285fb64cdd7_16.jpg', '2025-05-17 10:06:46'),
(25, 8, 'arts/68285fb64d00f_17.jpg', '2025-05-17 10:06:46'),
(26, 8, 'arts/68285fb64d23b_18.jpg', '2025-05-17 10:06:46'),
(27, 4, 'arts/68286ff41e7fc_24.jpg', '2025-05-17 11:16:04'),
(28, 6, 'arts/6828700e134bd_14.jpg', '2025-05-17 11:16:30'),
(29, 7, 'arts/682870cbeab3f_41a293be8a975a6b782dcf31d898a006.jpg', '2025-05-17 11:19:39'),
(30, 9, 'arts/6828719dcf171_images.jpg', '2025-05-17 11:23:09'),
(31, 10, 'arts/682872502fb32_kinya-yamakawa-sculpture-croped.jpg', '2025-05-17 11:26:08'),
(32, 11, 'arts/682872d35da41_dominik-wdoski-high-relief-sculpture-3.jpg', '2025-05-17 11:28:19'),
(33, 12, 'arts/682873fe85ea8_1-2-600x600.png', '2025-05-17 11:33:18'),
(34, 13, 'arts/6828744881dbe_images (1).jpg', '2025-05-17 11:34:32'),
(35, 14, 'arts/6828748b4c997_gym2-1024x956.jpg', '2025-05-17 11:35:39'),
(36, 15, 'arts/682874de74dbe_e7bb980067709d23cf8ee81dacdb6f70.jpg', '2025-05-17 11:37:02'),
(37, 16, 'arts/682875148a652_images (2).jpg', '2025-05-17 11:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `image_path`, `title`, `created_at`) VALUES
(9, '1678363738.jpg', '7', '2025-05-12 11:09:05'),
(10, '1678363743.jpg', '8', '2025-05-12 11:09:11'),
(11, '1697285374.jpg', '9', '2025-05-12 11:09:18'),
(12, '1697285869.png', '10', '2025-05-12 11:09:40'),
(13, '1697285934.png', '11', '2025-05-12 11:09:50'),
(14, '1707379508.jpeg', '12', '2025-05-12 11:10:04'),
(18, '1707379508.jpeg', '16', '2025-05-12 11:11:11'),
(19, '1707379528.jpeg', '17', '2025-05-12 11:11:20'),
(20, '1707379642.jpeg', '18', '2025-05-12 11:11:32'),
(21, '1707379762.jpeg', '19', '2025-05-12 11:11:44'),
(22, '1707380053.jpeg', '20', '2025-05-12 11:11:52'),
(23, '1707380091.jpeg', '21', '2025-05-12 11:12:01'),
(24, '1707380138.jpeg', '22', '2025-05-12 11:12:11'),
(25, '1707380415.jpeg', '23', '2025-05-12 11:12:27'),
(35, '19.jpg', '56', '2025-05-17 07:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `art_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `art_id`, `quantity`, `created_at`) VALUES
(26, 3, 4, 1, '2025-07-08 11:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`) VALUES
(3, 'Portrait Painting', 'portrait-painting', '2025-05-12 10:41:01'),
(4, 'Coloured Sketch', 'coloured-sketch', '2025-05-12 10:43:13'),
(5, 'Charcoal Sketch', 'charcoal-sketch', '2025-05-12 10:43:29'),
(6, 'Illustration & Drawing', 'illustration-drawing', '2025-05-12 10:47:28'),
(8, 'Tanjore Painting', 'tanjore-painting', '2025-05-12 10:47:53'),
(9, 'Sculpture Drawing', 'sculpture-drawing', '2025-05-12 10:48:09'),
(10, 'Army Portrait', 'army-portrait', '2025-05-12 10:48:56'),
(11, 'Relief Artwork', 'relief-artwork', '2025-05-12 10:49:19'),
(12, 'Handmade Caricature', 'handmade-caricature', '2025-05-12 10:49:30'),
(13, 'Pencil Sketch Artist', 'pencil-sketch-artist', '2025-05-12 10:49:48'),
(14, 'Wall Artists', 'wall-artists', '2025-05-12 10:50:04'),
(15, 'Couple Portrait Painting', 'couple-portrait-painting', '2025-05-12 10:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `celebrity_photos`
--

CREATE TABLE `celebrity_photos` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `celebrity_photos`
--

INSERT INTO `celebrity_photos` (`id`, `image_path`, `created_at`) VALUES
(10, 'celebrity/6821d4b12cb4b_celebrity1.jpg', '2025-05-12 11:00:01'),
(11, 'celebrity/6821d4b6d9435_celebrity2.jpg', '2025-05-12 11:00:06'),
(12, 'celebrity/6821d4bd53d62_celebrity3.jpg', '2025-05-12 11:00:13'),
(13, 'celebrity/6821d4c516f7a_celebrity4.jpg', '2025-05-12 11:00:21'),
(14, 'celebrity/6821d4ce9f204_celebrity5.jpg', '2025-05-12 11:00:30'),
(16, 'celebrity/6821d4e50659c_celebrity6.jpg', '2025-05-12 11:00:53'),
(17, 'celebrity/6821d4f1f0003_celebrity7.jpg', '2025-05-12 11:01:05'),
(18, 'celebrity/6821d505c885c_celebrity8.jpg', '2025-05-12 11:01:25'),
(19, 'celebrity/6821d505d6be8_celebrity8.jpg', '2025-05-12 11:01:25'),
(20, 'celebrity/6821d50c62b28_celebrity9.jpg', '2025-05-12 11:01:32'),
(21, 'celebrity/6821d525365cf_celebrity10.jpg', '2025-05-12 11:01:57'),
(22, 'celebrity/6821d52e9928c_celebrity11.jpg', '2025-05-12 11:02:06'),
(23, 'celebrity/6821d53548f6b_celebrity12.jpg', '2025-05-12 11:02:13'),
(24, 'celebrity/6821d548318d6_celebrity13.jpg', '2025-05-12 11:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `message`, `submitted_at`) VALUES
(6, 'Viral ads media', 'info@viraladsmedia.com', '', 'Test', '2025-05-08 09:40:05'),
(12, 'Starter Plan', 'asdfg@gmail.com', '7584457564', 'hjsdfh', '2025-05-14 12:30:55'),
(13, 'Raju', 'rajuali31@gmail.com', '7845789455', 'test', '2025-05-19 04:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `image_path`, `title`, `description`, `created_at`) VALUES
(4, 'events/6821d5c8a34cf_1678363577.jpg', '2', '', '2025-05-12 11:04:40'),
(6, 'events/6821d5f86ad97_1678363619.jpg', '2', '', '2025-05-12 11:05:28'),
(7, 'events/6821d6039431b_1678363577.jpg', '3', '', '2025-05-12 11:05:39'),
(8, 'events/6821d61199e7d_1678363590.jpg', '4', '', '2025-05-12 11:05:53'),
(9, 'events/6821d61eb1cc0_1678363625.jpg', '5', '', '2025-05-12 11:06:06'),
(10, 'events/6821d626d7147_1678363641.jpg', '6', '', '2025-05-12 11:06:14'),
(11, 'events/6821d637cde82_1678363600.jpg', '7', '', '2025-05-12 11:06:31'),
(12, 'events/6821d64047ab9_1678363610.jpg', '8', '', '2025-05-12 11:06:40'),
(13, 'events/6821d651a2ebb_1678363633.jpg', '10', '', '2025-05-12 11:06:57'),
(14, 'events/682830d6dd3f1_2.jpg', '1', '', '2025-05-17 06:46:46'),
(16, 'events/68283103aad70_4.jpg', '4', '', '2025-05-17 06:47:31'),
(17, 'events/6828311ebb250_8.jpg', '5', '', '2025-05-17 06:47:58'),
(18, 'events/682831576169a_5.jpg', '4', '', '2025-05-17 06:48:55'),
(19, 'events/68283166dc880_7.jpg', '8', '', '2025-05-17 06:49:10'),
(20, 'events/6828318103694_14.jpg', '78', '', '2025-05-17 06:49:37'),
(21, 'events/682831bf1bdf9_6.jpg', '5', '', '2025-05-17 06:50:39'),
(22, 'events/682831d9b7b0c_17.jpg', '7', '', '2025-05-17 06:51:05'),
(23, 'events/682831f6b94b6_25.jpg', '', '', '2025-05-17 06:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `media_images`
--

CREATE TABLE `media_images` (
  `id` int(11) NOT NULL,
  `embed_code` text NOT NULL,
  `caption` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media_images`
--

INSERT INTO `media_images` (`id`, `embed_code`, `caption`, `created_at`) VALUES
(3, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/P-uxXZs3Ids?si=nZ0QuWXi4CSIETee\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Radha Raman Painting', '2025-05-07 11:16:48'),
(5, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/hJ9_xmvnbOk?si=tDdMiQ_wj2wMwayk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Dr. Raajan Maluuja&#39;s New Podcast Coming Soon | POTRAIT PAINTINGS||', '2025-05-15 07:07:01'),
(6, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iO2zXZyrxUA?si=F8CDQOm9-Y5BoTTx\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Reflection Of Artist Part 2 ', '2025-05-17 06:32:33'),
(7, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/IeRVyZfRn1U?si=WOWLc8VXcUWdqfcg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'कैसे बने एक माहिर Artist ? | Raajan Maluuja | POTRAIT PAINTINGS|| #rajanmaluujaarts', '2025-05-17 06:34:01'),
(8, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NfB26Ia3aFs?si=8F-T43CcZXQcyJYY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Rajan Maluuja Arts ', '2025-05-17 06:34:52'),
(9, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/7bFfMqNrHLU?si=F1jWxor92EFo3JPF\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Radha Krishna Painting #radhakrishnaart #devotionalart #radhakrishn #radhakrishna #krishna', '2025-05-17 06:37:12'),
(10, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/QD-Tcc17Tps?si=iGkmC2M-3KKg6N7d\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Sri Ganesha Painting by Rajan Maluuja Arts #ganesh #ganesha #lordganesha #ganpati #ganpatibappa', '2025-05-17 06:38:03'),
(11, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ysYnjMDMW4U?si=qCcVmj91FByDEoF5\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Janmashtami Special 2022 |Janmashtami Krishna | Portrait Paintings | Krishna Ji K Bhajan', '2025-05-17 06:38:39'),
(12, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/KkAXpQ2JTTY?si=Vj6P5tay8y-xHAc_\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Hare Krishna Painting #harekrishna #krishna #iskcon #radhakrishna #devotional #canvaspainting #art', '2025-05-17 06:39:21'),
(13, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/EheOU5_a300?si=i7jYx6mU90FEC2LB\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '*Shri Mahatma Gandhi Rashtriya Abhimaan Puraskaar 2023* by*Padma Shri* Jitendra Singh Shanti Ji', '2025-05-17 06:39:58'),
(14, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_7-EIBB0KSs?si=q6AhM0qFuZE1pITQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Famous Fine Artist in India (Bharat Gourav Ratan) Dr Raajan Maluuja #famousartists #artist #kalakar', '2025-05-17 06:40:51'),
(15, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/10fVEaSdxjw?si=JNJ7A-Jfvfwxsx7E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Srila Prabhupada Ji | Acrylic painting of Shrila Prabhupada Potrait | Iskcon |', '2025-05-17 06:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `payment_status` varchar(50) DEFAULT 'unpaid',
  `razorpay_order_id` varchar(100) DEFAULT NULL,
  `razorpay_payment_id` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `status`, `payment_status`, `razorpay_order_id`, `razorpay_payment_id`, `created_at`) VALUES
(1, 3, 1.00, 'pending', 'pending', 'order_QqYFTlm27i09aU', NULL, '2025-07-08 16:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `art_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `art_id`, `quantity`, `price`) VALUES
(31, 1, 4, 1, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(2, 'client', 'client@gmail.com', '$2y$10$6IdrWvshD3Yk.i3TIxOqwOhVNTqr8sr8zSXqI4ImX6uQqEjL48eJ6', 'customer', '2025-05-03 07:04:08'),
(3, 'admin', 'admin@gmail.com', '$2y$10$TFbewvi3ubM.oJN8k0FMYuW8uJ9pispHyZ/q64XyFvBSM/2/w27ki', 'admin', '2025-05-06 11:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `art_images`
--
ALTER TABLE `art_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `celebrity_photos`
--
ALTER TABLE `celebrity_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_images`
--
ALTER TABLE `media_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `art_id` (`art_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `art_images`
--
ALTER TABLE `art_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `celebrity_photos`
--
ALTER TABLE `celebrity_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `media_images`
--
ALTER TABLE `media_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arts`
--
ALTER TABLE `arts`
  ADD CONSTRAINT `arts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `art_images`
--
ALTER TABLE `art_images`
  ADD CONSTRAINT `art_images_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `arts` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `arts` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `arts` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `arts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
