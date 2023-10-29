-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 04:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game4`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(8) NOT NULL,
  `gameid` varchar(11) NOT NULL,
  `bill_date` date DEFAULT NULL,
  `amount` float(10,3) DEFAULT NULL,
  `customerID` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `gameid`, `bill_date`, `amount`, `customerID`) VALUES
(1, 'NUNA105', '2023-10-11', 0.000, 11),
(1, 'NUNA114', '2023-10-11', 3999.000, 11),
(1, 'NUNA117', '2023-10-11', 3100.000, 11),
(1, 'UNA104', '2023-10-11', 1499.000, 11),
(2, 'NUNA112', '2023-10-11', 899.000, 11),
(3, 'NUNA116', '2023-10-11', 0.000, 11),
(4, 'NUNA102', '2023-10-11', 0.000, 11),
(5, 'NUA100', '2023-10-11', 3550.000, 3),
(5, 'NUA107', '2023-10-11', 2499.000, 3),
(5, 'NUA123', '2023-10-11', 0.000, 3),
(5, 'NUNA105', '2023-10-11', 0.000, 3),
(5, 'NUNA114', '2023-10-11', 3999.000, 3),
(6, 'NUA107', '2023-10-11', 2499.000, 0),
(6, 'NUA121', '2023-10-11', 3999.000, 0),
(6, 'NUA125', '2023-10-11', 2999.000, 0),
(6, 'NUNA105', '2023-10-11', 0.000, 0),
(6, 'NUNA114', '2023-10-11', 3999.000, 0),
(6, 'NUNA117', '2023-10-11', 3100.000, 0),
(6, 'NUNA120', '2023-10-11', 0.000, 0),
(7, 'NUA121', '2023-10-11', 3999.000, 8),
(7, 'NUNA105', '2023-10-11', 0.000, 8),
(8, 'NUA125', '2023-10-11', 2999.000, 8),
(9, ' NUNA10', '2023-10-14', 2500.000, 11),
(10, 'NUNA117', '2023-10-15', 3100.000, 3),
(11, 'NUNA110', '2023-10-15', 1708.000, 3),
(12, 'NUA124', '2023-10-15', 1300.000, 13),
(13, ' NUA105', '2023-10-28', 850.000, 3),
(13, 'NUA120', '2023-10-28', 2599.000, 3),
(14, 'NUNA120', '2023-10-28', 0.000, 3),
(15, 'NUNA102', '2023-10-28', 0.000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(8) NOT NULL,
  `gameid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `gameid`) VALUES
(0, 'NUA107'),
(0, 'NUA121'),
(0, 'NUA125'),
(0, 'NUNA105'),
(0, 'NUNA114'),
(0, 'NUNA117'),
(0, 'NUNA120'),
(8, 'NUA121'),
(8, 'NUNA105'),
(11, 'NUNA105'),
(11, 'NUNA114'),
(11, 'NUNA117'),
(11, 'UNA104'),
(13, 'NUA107'),
(13, 'NUA121'),
(13, 'NUNA105');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(8) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `contactno` varchar(14) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `emailaddress`, `password`, `firstname`, `lastname`, `contactno`, `dob`) VALUES
(0, 'aryan@gmail.com', 'e2071528cf1aa685779d9898ccd9b308', 'Aryan', 'Don', '8524567419', '2004-06-10'),
(1, 'trupal@gmail.com', '40b40166bf68cdf483bd6a2c485a41de', 'trupal', 'lathiya', '7418529630', '2004-02-03'),
(3, 'harshadmin@gmail.com', '95625bab8b5d86f0428897fb6f7e10b1', 'Harsh', 'Dedakiya', '8320966748', '2004-04-03'),
(8, 'devanshproject@gmail.com', '6693f506a7296d382b420815f23c0ac2', 'Devansh', 'MakOncee', '9029915453', '2004-02-14'),
(11, 'shreyp@gmail.com', '0606e8d93583fe61a78a0fe99ba34e3a', 'Shreyas', 'Parasmadi', '9856327415', '2011-10-10'),
(13, 'yashumraneerya@gmail.com', '9e8ce07ea0af9cf135b8fa0b3bee421f', 'Yash', 'Umraneeya', '8006900420', '2001-03-16'),
(16, 'kishankishu@gmail.com', 'e3381fdfdcc9f6820ed3e4e710c82d15', 'Kishan', 'DON', '8965471235', '1992-12-13'),
(17, 'adityaYYY@gmail.com', 'd273ca8d4b48b8289b900c48bcc45a8a', 'Aditya', 'Shreivastav', '7598463215', '2009-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `gameid` varchar(11) NOT NULL,
  `gamename` varchar(40) NOT NULL,
  `developer_name` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `genre_name` varchar(60) NOT NULL,
  `price` float(10,2) DEFAULT NULL,
  `gamesize` varchar(8) NOT NULL,
  `gametype` tinyint(1) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `mini_description` varchar(400) NOT NULL,
  `memory_required` int(4) NOT NULL,
  `operating_system` varchar(30) NOT NULL,
  `processor_required` varchar(40) NOT NULL,
  `storage_required` varchar(7) NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameid`, `gamename`, `developer_name`, `publisher_name`, `genre_name`, `price`, `gamesize`, `gametype`, `description`, `mini_description`, `memory_required`, `operating_system`, `processor_required`, `storage_required`, `release_date`) VALUES
(' NUA101', 'Call Of Duty Modern Warfare', 'Infinity Ward', 'Activision', 'Action, First Person Shooter Game ', 2500.00, '175 GB', 1, 'Modern warfare is warfare that is in notable contrast with previous military concepts, methods, and technology, emphasizing how combatantsmust modernize to preserve their battle worthiness.As such, it is an evolving subject, seen differently in different times and places. ', '\"Modern Warfare: A Notable Contrast of Evolving Battles, where Combatants Must Embrace Innovation to Preserve their Battle Worthiness and Redefine History.\"', 8, '64-bit Windows 10 or Higher', ' Intel® Core™ i3-4340 or AMD FX-6300 ', ' 175 GB', '2007-10-10'),
(' NUA102', 'Grand Theft Auto 3', 'Rockstar North', 'Rockstar Games', 'Action-adventure, Racing,Open-World Game', 950.00, '1.7 GB', 1, 'Set within the fictional Liberty City (loosely based on New York City) , the story follows Claude, a silent protagonist who,after being betrayed and left for dead by his girlfriend during a robbery, embarks ona quest for revenge that leads him to become entangled in a world of crime, drugs,gang warfare, and corruption. The game is played from a third-person perspective and its world is navigated on foot or by vehicle ', '\"In GTA 3\'s twisted Liberty City, betrayal sparks revenge, leading Claude into a web of crime, drugs, and corruption. Navigate this dangerous world, seeking vengeance with every step and drive.\"', 256, '64-bit Windows 7 or Higher', ' Pentium III® 450 MHz CPU ', '2 GB', '2001-10-11'),
(' NUA103', 'Grand Theft Auto V', 'Rockstar Game', 'Rockstar Game', 'Action-Adventure , Open-World Game', 1300.00, '72 GB ', 1, 'Grand Theft Auto V is an action-adventure game played from either a third-person orfirst-person perspective. Players complete missions—linear scenarios with set objectives—to progress through the story. Outside of the missions, players may freely roam the open world. ', '\"Grand Theft Auto V: Unleash Chaos and Adventure in the Open World!\"', 8, 'Windows 8.1 64 Bit or Higher', '  Intel Core i5 3470 @ 3.2GHz (4 CPUs) /', ' 72 GB', '2013-09-17'),
(' NUA104', 'Wolfenstein New Order', 'MachineGames ', 'Bethesda Soft', 'Action-Adventure, First Person Shooter Game', 1130.00, '50 GB', 1, 'The game is played from a first-person perspective and most of its levels are navigatedon foot. The story is arranged in chapters, which players complete in order to progress.A morality choice in the prologue alters the games storyline some characters and small plot points are replaced throughout the two timelines ', '\"Embark on a first-person odyssey through \'Wolfenstein: The New Order.\' Navigate on foot through captivating chapters, while your choices reshape the storyline across two timelines. Rewrite history in a heroic revolution.\"', 4, '64-bit Windows 7 or Higher', '  Intel Core i7 or equivalent AMD  ', ' 50 GB', '2014-08-20'),
(' NUA105', 'Resident Evil 2', 'Capcom ', 'Capcom', 'Survival Horror', 850.00, '26 GB', 1, 'The player controls rookie cop Leon S. Kennedy and college student Claire Redfield,who must escape Raccoon City after its citizens are transformed into zombies by abiological weapon two months after the events of the original Resident Evil.The gameplay focuses on exploration, puzzles, and combat; the main difference from its predecessor are the branching paths, with each player character having unique storylines, partners and obstacles. ', '\"Survive Raccoon City\'s Zombie Nightmare. Play as Leon S. Kennedy and Claire Redfield in Resident Evil 2 Remake. Uncover secrets, fight for survival, and forge bonds in this gripping horror adventure.\"', 8, '64-bit Windows 10 or Higher', '  Intel® Core™ i5-4460 or AMD FX™-6300 o', ' 26 GB', '2019-01-25'),
(' NUA106', 'Counter-Strike Global Offensive', 'Valve and Hid', 'Valve Corporat', 'Tactical Shooter', 0.00, '15 GB', 1, 'Counter-Strike: Global Offensive (CS:GO) is a round-based, 5v5 tactical FPS with an Attackers vs. Defenders setup and no respawns, meaning if a player is eliminated they will not respawn until the next round ', '\"Counter-Strike: Global Offensive (CS:GO) - Engage in Heart-Pounding Tactical Warfare with No Second Chances!\"', 6, 'Windows XP/VISTA/XP or Higher', '  Intel® Core™ 2 Duo E6600 or AMD Phenom', ' 15 GB', '2012-08-21'),
(' NUNA10', 'Assassins Creed Odyssey', 'Ubisoft Quebe', 'Ubisoft', 'Action Role-Play , Open-World Game', 2500.00, '46 GB', 1, 'Assassins Creed Odyssey is an action role-playing video game played from a third-personperspective. At the beginning of the game, the player can select to play as either Alexios or Kassandra, Greek mercenaries and descendants of the Spartan king Leonidas I ', '\"Experience the Ultimate Action RPG as a Mighty Greek Mercenary, Unraveling Ancient Secrets and Unleashing the Power of Spartan Bloodlines!\"', 8, '64-bit Windows 10 or Higher', '  AMD Ryzen 7 1700X @ 3.8 GHz, Intel C', ' 46 GB', '2018-10-20'),
('NUA100', 'Cyberpunk2077', '  CD Projekt Re', 'CD Project', 'Science-Fiction , Open-World Game', 3550.00, '55.5 GB', 1, 'Cyberpunk 2077 is an open-world, action-adventure RPG set in the dark future of Night City — a dangerous megalopolis obsessed with power, glamor, and ceaseless body modification. ', '\"Venture into Night City\'s Dark Megalopolis in Cyberpunk 2077 - Where Power, Glamor, and Body Modification Collide in an Epic Open-World RPG Adventure!\"', 8, '64-bit Windows 10 or Higher', ' Intel Core i5-3570K, AMD FX-8310 or bet', ' 70 GB', '2020-12-07'),
('NUA107', 'Ghostwire Tokyo', 'Tango Gameworks', 'Bethesda Software', 'Action-Adventure, Open-World Game', 2499.00, '20 GB', 1, 'Ghostwire: Tokyo is an action-adventure game played from a first-person perspective. The player can use various psychic and paranormal abilities to defeat the ghosts and spirits haunting Tokyo.[4] Combat director Shinichiro Hara described the combat as \"karate meets magic\", as the player character utilizes hand movements inspired by Kuji-kiri hand gestures to cast spells. When an enemy loses most of their health, its core is exposed and the player can use takedown moves to destroy it. By defeating these spirits and collecting Yokai, the character will collect spirit points and resources used to upgrade their abilities', ' \"Ghostwire: Tokyo - Unleash psychic powers, defeat haunting spirits, upgrade abilities.\"', 16, '64-BIT WINDOWS 10 or Higher', 'CORE i7 8700 OR AMD RYZEN 5 5600X', '26 GB', '2023-03-25'),
('NUA108', 'Sleeping Dogs', 'United Front Games', 'Feral Interactive, Square Enix', 'Action-Adventure, Open-World Game ', 729.00, '15 GB', 1, 'Sleeping Dogs is an action-adventure game set in an open world environment and played from a third-person perspective. The player controls Wei Shen, a Chinese-American police officer who goes undercover and ventures out on a raid to infiltrate the Sun On Yee Triad organization.', '\"Embark on a Thrilling Undercover Journey in Sleeping Dogs, Unleash Your Inner Police Officer and Take on the Sun On Yee Triad!\"', 4, '64-bit Windows Vista or Higher', 'Core 2 Duo 2.4GHz or Athlon X2 2.7GHz', '20 GB', '2014-10-08'),
('NUA109', 'Watch Dogs', 'Ubisoft Montrea', 'Ubisoft', 'Action-Adventure, Open-World Game', 2999.00, '25 GB', 1, 'Watch_Dogs takes place in a fully simulated living city where, using your smartphone, you have real-time control over the city’s infrastructure. Trap your enemy in a 30-car pileup by manipulating the traffic lights. Stop a train, and then board it to evade the authorities. Narrowly escape capture by quickly raising a drawbridge. Anything connected to the city’s CTOS can become your weapon.', '\"Step into the Digital Battlefield - Watch_Dogs: Where the City is Your Playground and Your Smartphone is the Ultimate Weapon!\"', 6, 'Windows Vista/7 or Higher', '2.66 GHz Intel® Core2 Quad Q8400 or 3.0 ', '28 GB', '2014-05-17'),
('NUA111', 'DayZ', 'Bohemia Interactive', 'Bohemia Interactive', 'Action, Adventure, Massively Multiplayer', 2750.00, '16 GB', 1, 'There are no map markers, daily quests, or scoreboards to help you create your story. There is only Chernarus – 230 square kilometers of post-Soviet country that was struck by an unknown virus, which turned the majority of its population into raging infected.\n\nYour task? To survive the collapse of civilization for as long as you possibly can. Keep in mind that death is permanent in unforgiving Chernarus. All you’ll have when you start over again are the memories of your final mistake.', '\"Embrace the Challenge of DayZ - No Map Markers, No Handholding, Just Your Survival Instincts Against the Unforgiving Infected. Can You Survive in Chernarus and Create Your Own Epic Story?\"', 8, '64-bit Windows 7 or Higher', 'Intel Core i5-4430 or More', '25 GB', '2018-12-13'),
('NUA112', 'Splitgate', '1047 Games', '1047 Games', 'Action - First Person Shooter Game ', 0.00, '15 GB', 1, 'Splitgate is a fast-paced sci-fi multiplayer shooter that combines portal mechanics with explosive FPS gameplay. Developed and published by 1047 Games, it\'s free-to-play and was released on various platforms, including PC, Xbox, and PlayStation.', '\"Embark on a thrilling interdimensional adventure in Splitgate - the electrifying fusion of portal mechanics and heart-pounding FPS action.\"', 6, '64-bit Windows 7 or Higher', 'Any dual core CPU.', '15 GB', '2019-04-24'),
('NUA113', 'Limbo', 'Playdead', 'Microsoft Game Studios Playdead', 'Puzzle-Platform , Adventure Game', 369.00, '150 MB', 1, 'Limbo is a 2D side-scroller, incorporating a physics system that\r\ngoverns environmental objects and the player character. \r\nThe player guides an unnamed boy through dangerous environments and \r\ntraps as he searches for his sister.', '\r\n\"Navigate the perils of Limbo, where a brother\'s love defies physics in a 2D odyssey to rescue his sister.\"', 512, 'Windows XP/Vista or Higher', '2GHz', '150 MB', '2010-07-21'),
('NUA114', 'Inside', 'Playdead', 'Playdead', 'Puzzle-Platform , Adventure Game', 599.00, '3 GB', 1, 'Inside is a puzzle platformer. The player character is an unnamed boy \r\nwho explores a surreal and mostly monochromatic environment presented \r\nas a 2.5D platform game. The game is dark, with color used sparingly \r\nto highlight both the player and certain parts of the environment. \r\nThe game is mostly silent, with the exception of occasional musical cues, \r\nthe boy\'s vocals, dogs barking, equipment and sound effects. The player \r\ncontrols the boy who walks, runs, swims, climbs, and uses objects to \r\novercome obstacles and progress in the game.[1] The boy gains the \r\nability to control bodies to complete certain puzzles, a mechanic \r\nthat IGN\'s Marty Sliva compared to a similar mechanic in The \r\nSwapper.[2] At various points in the game, the player may discover \r\nhidden rooms containing glowing orbs. If all the orbs are deactivated \r\nduring a playthrough, the player unlocks the game\'s alternate ending.', '\"Dive into \'Inside\': Navigate a monochromatic 2.5D world, solving puzzles, manipulating shadows, and discovering hidden orbs to reveal alternate endings.\"', 4, '64-bit Windows 7 or Higher', 'Intel Core 2 Quad Q6600 @ 2.4 GHz, AMD F', '3 GB', '2016-07-07'),
('NUA115', 'Zero Hour', 'M7 Productions, Attrito', 'Attrito, M7 Productions', 'Tactical Shooter , First Person Shooter Game', 649.00, '10 GB', 1, 'A tactical FPS with online team-based action gameplay that takes place in a variety of locations in Bangladesh with \r\nrealistic scale & resource management. Inspired by various other tactical shooter games, Zero Hours tries to create a very \r\ngrounded experience in both the co-op and PvP gamemodes. The defenders are tasked to protect the bomb from being defused or \r\nkeep their hostage from being rescued and/or running away. On the contrary, the attackers are to defuse the bomb or rescue the \r\nhostage being held captive. Both sides can also win by eliminating everyone on the other team.\r\nIn other hand, coop brings you deep into the realistic Close Quarters Combat with more tactics avaiable rather than in PvP. \r\nIn coop, MS-09 units are tasked to various mission objectives like bomb situation, hostage situation, assasination, and more.', '\"Close Quarters Combat, coop\'s domain, Zero Hours\' realism keeps you in the game.\r\nFrom bomb\'s ticking dread to hostages\' plight, Zero Hours unfolds the ultimate fight.\"', 6, '64-bit Windows 7 or Higher', 'Intel Core i3-7100 or AMD Ryzen 3 1200.', '25 GB', '2020-07-12'),
('NUA116', 'Squad', 'Offworld Industries', 'Offworld Industries', 'First-Person Shooter, Tactical Shooter', 820.00, '55 GB', 1, 'Squad is a tactical shooter based around squad gameplay designed to encourage teamwork and communication. \r\nA match is played between two belligerent teams, with each team being made up of squads that cap at nine players. \r\nPlayers in squads select from various soldier classes which play distinct roles in combat, such as suppressive fire \r\nfrom an automatic rifleman, anti-tank support from a MANPATS gunner, or medical support from a combat medic. \r\nA squad of players is led by a squad leader, who can communicate with other allied squad leaders and construct structures \r\nsuch as forward operating bases and defensive emplacements.[4] Any squad leader can additionally nominate himself for the \r\nposition of commander, who, once voted into position, can coordinate his team\'s battle plan and call in additional support \r\nsuch as UAV recon and artillery.', 'Forge bonds on the battlefield: Squad, where teamwork isn\'t just an option, it\'s the ultimate weapon.\r\nNine players, one mission: Join the tactical revolution in Squad, where strategy is your strongest ally.', 16, '64-bit Windows 7 or Higher', 'Intel Core i or AMD Ryzen with 6 physica', '55 GB', '2020-09-23'),
('NUA117', 'Divinity Original Sin II', 'Larian Studios', 'Larian Studios (PC)', 'Role-Playing', 999.00, '25 GB', 1, 'Divinity: Original Sin II is a role-playing video game played from an isometric perspective.\r\nThe player begins the game by selecting one of six pre-made characters with their own backstories, or creating a \r\ncustom character and choosing their stats, race, gender and origin story. The choices of races are human, elf, lizard, dwarf, and \r\nundead, a race not available in Original Sin. Players can play solo or with up to three companions in their party.\r\nAll companions are fully playable, and will potentially have unique interactions with the environment and non-player characters \r\n(NPCs). Players are able to split up and individually control their party members, leading to potentially complex battle tactics and \r\nrole-playing opportunities. The game features both online and local multiplayer modes, both competitive and cooperative.', 'Forge your epic saga in Divinity: Original Sin II, where choices shape destiny from an isometric view.\r\nFrom human to undead, Divinity: Original Sin II\'s races diverse, in a fantasy world you\'ll immerse.', 4, '64-bit Windows 7 or Higher', 'Intel Core i5 or equivalent', '25 GB', '2017-09-14'),
('NUA118', 'Pillars of Eternity II Deadfire', 'Obsidian Entertainment', 'Versus Evil', 'Role-playing Video Game, Adventure game, Strategy game', 1249.00, '45 GB', 1, 'Pillars of Eternity II: Deadfire is a role-playing video game that is played from an isometric perspective.\r\nBoth returning and new companions are available, depending upon the choices made by the player, which play an optional story role \r\nwithin the game. Deadfire focuses on seafaring and island exploration via a ship. Crews can also be hired to look over them and assist \r\nin ship combat. Class based gameplay returns, with each class having at least four optional sub-classes with unique skills. A new feature \r\nin Deadfire compared to the original are sub-classes.', 'From crew to combat, Pillars of Eternity II: Deadfire, a seafaring odyssey to which all aspire.\r\nNavigate the seas in Pillars of Eternity II: Deadfire, where islands await, and ships never tire.', 4, 'Windows Vista 64-bit or Higher', 'Intel Core i3-2100T @ 2.50 GHz / AMD Phe', '45 GB', '2018-06-08'),
('NUA119', 'Fallout New Vegas', 'Obsidian Entertainment', 'Bethesda Softworks', 'Action Game , Role-playing Game', 499.00, '10 GB', 1, 'Fallout: New Vegas builds on the gameplay foundation of Fallout 3, enhancing combat, refining the third-person perspective, streamlining character creation, and introducing new weapons, perks, and skills. The game offers strategic combat with updated V.A.T.S. attacks, a more immersive third-person view, and an expanded skill system that influences conversations and decision outcomes. It introduces an array of weapons and perks, shaping a tactical experience in the Mojave Wasteland.', '\"Obsidian\'s touch: Fallout: New Vegas polished old gameplay and sparked new thrills.\r\nV.A.T.S. revamped, melee kills enhanced, Fallout: New Vegas brought combat\'s dance.\r\nFrom iron sights to over-the-shoulder view, Fallout: New Vegas gave perspectives anew \"', 2, 'Windows XP or Higher', 'Dual Core 2.0GHz', '10 GB', '2010-10-22'),
('NUA120', 'Injustice 2', 'NetherRealm Studios', 'Warner Bros. Interactive Entertainment', 'Fighting , Action , Multiplayer , Single-Player , ', 2599.00, '52 GB', 1, 'Injustice 2 is a fighting game in which players compete in one-on-one combat using characters from the DC Universe and other \r\nthird-party franchises. Using different combinations of directional inputs and button presses, players must perform basic attacks, \r\nspecial moves, and combos to try to damage and knock out the opposing fighter. Injustice 2 retains numerous gameplay mechanics\r\nfrom Injustice: Gods Among Us, including environment interaction, stage transitions, clashes, and character traits.\r\nThe trait system, like before, provides a temporary buff or ability that complements each character\'s playstyle.\r\nThe super meter, which allows players to execute enhanced special moves and unlock powerful \"super moves\" when fully charged, \r\nalso returns.Players can expend meter to perform new techniques, such as an evasive forward roll, which provides a way to overcome \r\nenemy keep-away tactics, or an air recovery, which lets characters escape an opponent\'s combo early.Most environmental attacks, which \r\nwere completely unavoidable in the first Injustice game, can now be blocked or dodged; however, certain environmental attacks with \r\nlarge amounts of startup, such as throwing a car, remain unblockable.', '\"Unleash DC\'s might in Injustice 2, where heroes and villains brawl, both old and new.\r\nFrom Gotham\'s streets to worlds askew, Injustice 2\'s universe awaits you.\r\nSuper moves and clashes soar high, Injustice 2\'s battles reach for the sky.\"', 4, '64-bit Windows 7 or Higher', 'Intel Core i5-750, 2.66 GHz / AMD Phenom', '52 GB', '2017-12-01'),
('NUA121', 'Street Fighter 6', 'Capcom', 'Capcom', 'Fighting , Action-Adventure , Action Game', 3999.00, '60 GB', 1, 'Street Fighter 6 features three overarching game modes: Fighting Ground, World Tour, and Battle Hub.\r\nFighting Ground contains local and online versus battles as well as training and arcade modes, all featuring similar 2D \r\nfighting gameplay to the previous games in the series, in which two fighters use a variety of attacks and special abilities \r\nto knock out their opponent. World Tour is a single-player story mode featuring a customizable player avatar exploring 3D \r\nenvironments, such as Final Fight\'s Metro City and the small, fictional South Asian nation of Nayshall, with action-adventure \r\ngameplay. Battle Hub acts as an online lobby mode, using customizable player avatars from the World Tour mode \r\n(the first fighting game to implement similar online features was Tecmo\'s Dead or Alive 4). In the Battle Hub, \r\nplayers can compete in ranked or casual matches, battle using their created avatars, using the skills learned in World Tour \r\nmode, participate in special events, or play emulated Capcom arcade titles, using the same emulation technology used in the \r\nCapcom Arcade Stadium series, among other features .', '\"From Fighting Ground\'s fierce exchanges, to World Tour\'s tale, the adventure ranges.\r\nUnleash attacks, abilities divine, in Street Fighter 6, victory will shine.\r\nSkill from World Tour, battles ignite, Street Fighter 6\'s showdowns take flight \"', 8, '64-bit Windows 10 or Higher', 'Intel Core i5-7500 / AMD Ryzen 3 1200.', '60 GB', '2023-06-01'),
('NUA122', 'Samurai Shodown', 'SNK CORPORATION', 'SNK CORPORATION', 'Fighting , Action Game', 1349.00, '35 GB', 1, 'Samurai Shodown is a 2D fighting game with 3D graphics that uses many elements from past games in the series. \r\nIt shares similarities with The King of Fighters XIV and SNK Heroines: Tag Team Frenzy.\r\nThe controls consists of four buttons: weak, medium, strong blows with weapons and \r\nBy pressing special combinations, the character can carry out captures, counterattacks, interceptions and evasions. \r\nThe Rage Gauge is back in the game. It replenishes after each damage taken by the character. A fully filled scale gives access \r\nto new abilities. After gaining a full scale, the player can activate the rage mode, which increases the character\'s strength \r\nfor a while and opens up the opportunity to inflict a disarming blow to the opponent. During the activation of the fury mode, \r\nan explosion occurs, pushing the enemy away and opening him up for attack. After the end of the rage mode, the player is deprived \r\nof the opportunity to use the scale until the end of the match.', 'Echoes of the past, a fusion so neat, Samurai Shodown\'s legacy, can\'t be beat.\r\nCaptures, counters, skills so grand, Samurai Shodown\'s moves at your hand.', 8, 'Windows 7 or Higher', 'Intel Core i5 ', '35 GB', '2020-06-11'),
('NUA123', 'Hyper Scape', 'Ubisoft Montreal', 'Ubisoft', 'Battle royale , First-person Shooter , Action Game', 0.00, '9 GB', 1, 'The game\'s main mode shares elements with other battle royale games, where up to 100 players are dropped on to a map that \r\nslowly shrinks over time with players seeking to eliminate the competition. One main difference between Hyper Scape and other \r\npopular battle royale games is that in Hyper Scape, insteading of a circle shrinking as the game progresses, random sectors of \r\nthe map disappear. The game however differs in that once the last sector closes, a crown appears, any player that is able to \r\nhold on to the crown for 60 seconds is automatically declared the winner. Alternatively, the game also ends when only one player \r\nor team remains.', '\"Dropped in chaos, competitors abound, in Hyper Scape\'s realm, victory\'s found.\r\nSectors vanish, map\'s shifting beat, in Hyper Scape\'s realm, battles heat.\"', 6, 'Windows 7 or Higher', 'Intel Core i3 3220 @ 3.3GHz or AMD FX-41', '9 GB', '2020-08-11'),
('NUA124', 'Soma', 'Frictional Games', 'Frictional Games', 'Survival , Horror', 1300.00, '25 GB', 1, 'Soma is a survival horror video game played from a first-person perspective.\r\nThe player will encounter a number of creatures, which each embody an aspect of the game\'s themes.Throughout Soma, the \r\nplayer will find a large array of clues,[8] such as notes and audio tapes, which builds atmosphere and furthers the plot. \r\nSimilar to most titles by Frictional Games, the player progresses through puzzle-solving, exploration, and the use of stealth;\r\nthe player may die if they fail to avoid monsters, although two years after the initial release, a \"Safe Mode\" has been added \r\nthat keeps the monsters but stops them from killing the player.', '\"Peer through Soma\'s lens of dread, a first-person tale where horrors tread. Themes embodied, creatures take their stance, \r\nin Soma\'s realm, suspense will enhance \"', 4, 'OS-64-bit Major Linux', 'Core i3 / AMD A6 2.4Ghz.', '25 GB', '2015-09-22'),
('NUA125', 'Dead Space', 'Motive Studio', 'Electronic Arts', 'Survival , Horror', 2999.00, '50 Gb', 1, 'Dead Space features various changes from the original game. Unlike the original in which he was a silent protagonist, \r\nIsaac now has voice lines of his own. In addition, previous voice lines and conversations remade for the game were adjusted to \r\ninclude Isaac who will now engage in discussion and even argue with the other characters. The game also features more gore than the \r\noriginal, introducing a \"peeling\" system in which the player can tear and destroy the bodies of the Necromorphs. Various weapons are \r\nmore suitable for severing limbs, while others are more suitable for completely destroying bodies. The remake also improves on the \r\nzero gravity element of the original, providing Isaac with thrusters to freely move across designated areas of the Ishimura.', '\"Dead Space , changes untold, Isaac\'s voice echoes, his story unfolds. From silent to voiced, dialogue now blooms, \ndiscussions ignite, in fear\'s looming rooms \"', 16, '64-bit Windows 10 or Higher', 'Core i5 8600 or Equivalent', '50 GB', '2023-01-27'),
('NUA127', 'PlayerUnknown\'s Battlegrounds', 'PUBG Studios', 'Krafton Microsoft Studios (Xbox One) Ten', 'Battle Royale , Multiplayer Game', 0.00, '30 GB', 1, 'PUBG: Battlegrounds (PlayerUnknown\'s Battlegrounds) is a battle royale game where up to 100 players parachute onto an island, scavenge for weapons and gear, and fight to be the last player or team standing. The game\'s map gradually reduces in size, forcing players into encounters until a winner emerges. It was released in 2017 and has become one of the most popular and highest-grossing video games of all time, popularizing the battle royale genre.', '\" PUBG: Battlegrounds - Drop, Scavenge, Conquer! Parachute onto an island, gear up, and fight to be the last one standing. Survive shrinking battlegrounds and emerge victorious! This 2017 sensation has redefined gaming, making it a battle royale legend!\"', 8, 'Windows 10 or Higher', 'Intel i5-6600K / AMD Ryzen 5 1600', '50 GB', '2017-03-27'),
('NUNA102', 'Braid', 'Number None ', 'Number None I', 'Puzzle-Platform Video game ', 0.00, '200 GB', 0, 'Braid is a puzzle-platformer, drawn in a painterly style, where you can manipulate the flow of time in strange and unusual ways. From a house in the city, journey to  a series of worlds and solve puzzles to rescue an abducted princess ', '\"Braid: Embark on a Time-Bending Adventure, Explore Mystical Worlds, and Save the Princess from Abduction in this Artistic Puzzle-Platformer!\"', 256, 'Windows XP or Higher', ' 1.4 GHz or faster ', ' 200 MB', '2008-07-01'),
('NUNA104', 'Arsenal of Democracy', 'BL-Logic', 'BL-Logic', 'Real-time Grand Strategy Game', 0.00, '1.5 GB', 1, 'Arsenal of Democracy is a grand strategy wargame that is based on Hearts of Iron II - Armageddon and its Europa Engine. It is developed by BL-Logic, a development studio made up by fans of the Hearts of Iron series and active members of the modding community ', '\"Step into History\'s Crucible - Arsenal of Democracy: A Grand Strategy Wargame Powered by Hearts of Iron II - Armageddon\'s Europa Engine. Crafted by Devoted Fans Turned Developers at BL-Logic.\"', 2, 'Windows XP or Higher', ' 1.0GHz Athlon/ Pentium 3 or better ', ' 1.5 GB', '2010-02-23'),
('NUNA105', 'Fortnite', 'Epic Games', 'Epic Games', 'Battle Royale Game, Online Game', 0.00, ' 32 GB', 1, 'Fortnite Battle Royale is a player-versus-player game for up to 100 players,allowing one to play alone, in a duo, or in a squad (usually consisting of three or four players). ', '\"Fortnite Battle Royale: Join the ultimate player-versus-player showdown with up to 100 players! Team up in duos or squads, or conquer the battlefield solo in this action-packed gaming sensation!\"', 8, 'macOS: 10.15.4 ', '  Intel i9 2.4 GHz ', ' 32 GB', '2017-07-15'),
('NUNA109', 'Batman Arkham City', 'Rocksteady Studios', 'Warner Bros. Games', 'Action-Adventure Game', 0.00, '17 GB', 1, 'Batman: Arkham City is a 2011 action-adventure game developed by Rocksteady Studios and published by Warner Bros. Interactive Entertainment. Based on the DC Comics superheroBatman, it is the sequel to the 2009 video game Batman: Arkham Asylum and the second installment in the Batman: Arkham series ', '\"Unleash the Dark Knight Within - Batman: Arkham City, an action-adventure game sequel to Batman: Arkham Asylum, developed by Rocksteady Studios and published by Warner Bros. Interactive Entertainment in 2011.\"', 4, 'Windows XP or Higher', ' Intel Core 2 Duo 2.4 GHz or AMD Athlon ', ' 17 GB', '2011-10-20'),
('NUNA110', 'Need for Speed Payback', 'Ghost Game', 'Electronic Arts', 'Racing', 1708.00, '30 GB', 1, 'Need for Speed Payback is a racing video game developed by Ghost Games and published by Electronic Arts for PlayStation 4, Windows, and Xbox One. It is the twenty-third installment in the Need for Speed series. The game was released worldwide on November 10, 2017, with mixed reviews from critics.', '\"Rev Your Engines and Hit the Roads: Need for Speed Payback - An Epic Racing Adventure from Ghost Games and Electronic Arts. Get Ready for Heart-Pounding Action!\"', 8, '64-bit Windows 10 or Higher', 'Ryzen 5 2600, Core i5-8600', '30 GB', '2015-11-15'),
('NUNA111', 'Grand Theft Auto Vice City', 'Rockstar', 'Rockstar', 'Action-Adventure, Open-World Game', 499.00, '1.5 GB', 1, 'Welcome to Vice City. Welcome to the 1980s. From the decade of big hair, excess and pastel suits comes a story of one man\'s rise to the top of the criminal pile.', '\"Welcome to Vice City, the neon-soaked playground of the 1980s. In this decade of excess, witness one man\'s relentless ascent to the top of the criminal pile.\"', 256, 'Microsoft Windows 7 or Higher', '800 MHz Intel Pentium III or 800 MHz AMD', '2.5 GB', '2002-10-28'),
('NUNA112', 'Need For Speed Most Wanted', 'Criterion Software', 'Electronic Arts', 'Open-World Racing Game', 899.00, '20 GB', 1, 'The open-world action in Need for Speed Most Wanted gives you the freedom to drive your way. Hit jumps and shortcuts, switch cars, lie low or head for terrain that plays to your vehicle\'s unique strengths. Fight your way past cops and rivals using skill, high-end car tech and tons of nitrous.', '\"Experience Unleashed Freedom in Need for Speed Most Wanted. Race, Evade, and Dominate as you Take Control of the Open World, Master Jumps, Switch Cars, and Outsmart Cops and Rivals with Skill and Nitrous Power!\"', 4, 'Windows 7 or Higher', 'Quad-Core CPU or More', '20 GB', '2005-11-11'),
('NUNA113', 'Asphalt 9 Legends', 'Gameloft', 'Gameloft, Gameloft Iberica S.A.U.', 'Racing Game', 0.00, '2 GB', 1, 'Asphalt 9: Legends, released in 2018 by Gameloft, is a racing game with a notable car lineup, including the \"TouchDrive\" autopilot mode and \"shockwave nitro.\" Compared to Asphalt 8, the graphics are significantly improved. The game features 219 cars divided into classes (D, C, B, A, and S), with players starting from the Mitsubishi Lancer Evolution X (Class D) and progressing to the Bugatti Bolide (Class S). To unlock and enhance cars, blueprints are required, and customization is possible through the car editor. Moreover, cars now consume fuel during races, depending on their star level.', '\"Get ready for heart-pounding action in Asphalt 9: Legends! Race through stunning tracks, use the \'TouchDrive\' autopilot for precision maneuvers, and unleash the \'shockwave nitro\' for a burst of speed. With 219 cars to choose from, each with unique blueprints and customizable options . Fuel your passion for racing and conquer the road in this adrenaline-fueled game!\"', 4, 'Windows 10 or Higher', 'Core i3-3110M | AMD Ryzen 3 3300U or bet', '2 GB', '2018-02-26'),
('NUNA114', 'Froza Horizon 5', 'Playground Games', ' Xbox Game Studios, Motorsport Horizon R', 'Racing Game', 3999.00, '103 GB', 1, 'Forza Horizon 5, released in 2021, takes you on the ultimate Horizon Adventure in a fictionalized version of Mexico. Explore vibrant landscapes, drive the world\'s greatest cars, and conquer the challenging Sierra Nueva in the epic Horizon Rally. Get ready for limitless driving action and thrilling racing experiences. Expansion sold separately.', '\"Forza Horizon 5: Ultimate Horizon Adventure in Mexico. Explore vibrant landscapes, iconic cars, and conquer the challenging Sierra Nueva in adrenaline-pumping Horizon Rally. Get ready for limitless driving action!\"', 8, 'Windows 10 or Higher', 'Intel i5-4460 or AMD Ryzen 3 1200. Memor', '110 GB', '2021-11-05'),
('NUNA116', 'Valorant', 'Riot Games', 'Riot Games', 'Tactical shooter , First Person Shooter Game', 0.00, '16 GB', 1, 'Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games for Windows. Initially teased as \"Project A\" in October 2019, it entered a closed beta in April 2020 before its official release on June 2, 2020. The game combines elements of CS:GO\'s competitive FPS with Overwatch\'s diverse heroes, offering flashy skills and abilities that can influence the outcome of a round. Each class possesses unique abilities, like leaping high in the air or revealing enemy positions, with ultimate abilities that can damage enemies through walls. Valorant\'s polished design, balanced maps, and heroes contributed to its successful Early Access, promising even more improvements in the future.', '\"Valorant: The Epic Fusion of CS:GO and Overwatch, Unleash Heroic Powers and Strategic Genius in a Free-to-Play FPS Showdown! Master Unique Abilities, Dominate Rounds, and Conquer the Competition through Walls!\"', 4, '64-bit Windows 7 or Higher', 'Intel Core 2 Duo E8400, AMD Athlon 200GE', '20 GB', '2020-06-02'),
('NUNA117', 'Gord', 'Covenant.dev', 'Team17', 'Strategy game, Simulation Video Game, Narrative, Entertainm', 3100.00, '20 GB', 1, 'Gord, a single-player adventure strategy game that blends survival with conquest. Build a thriving civilization while venturing into the darkness beyond the gates. Navigate eerie lands, manage a populace with personal stories, and shape your settlement\'s fate through quests and decisions. Gord intertwines strategic brilliance with immersive storytelling, offering a unique gaming experience where your choices determine the destiny of your tribe.', '\"GORD: Shape Destiny, Conquer Darkness.Forge Realms, Unleash Legends - GORD Awaits Your Command.\"', 8, 'Windows 10 or higher', 'Intel Core i5-6600 3.3 GHz or AMD Ryzen ', '20 GB', '2023-08-17'),
('NUNA118', 'Hearthstone', 'Blizzard Entertainment', 'Blizzard Entertainment', 'Card Game , Strategy game', 0.00, '3', 1, 'THE HEARTHSTONE GAME is a captivating turn-based card duel that unfolds between two opponents, each wielding decks meticulously composed of 30 cards, in addition to selecting a hero endowed with distinctive powers. Within the intricate strategy of the game, players judiciously allocate their finite mana crystals to either unleash potent abilities or conjure minions to launch calculated assaults against their adversary. The ultimate objective revolves around the intricate dance of strategy: to decimate the opponent\'s hero and secure triumph in this enchanting clash of wits and tactics.', '\"Unleash your strategic prowess and wield your cards wisely in THE HEARTHSTONE GAME, where heroes clash, mana crystals gleam, and victory awaits the cunning.\"', 3, 'Windows 7 or Higher', 'Intel® Pentium® D or AMD® Athlon™ 64 X2', '3 GB', '2014-03-11'),
('NUNA119', 'No Man\'s Sky', 'Hello Games', 'Hello Games', 'Action-adventure, survival , Science-Fiction', 2300.00, '6 GB', 1, 'No Man\'s Sky is a game about exploration and adventure in a procedurally generated universe. You can travel to any star in the galaxy and explore its planets, which are all unique and contain their own lifeforms and resources. You can also build bases, trade with other players, and engage in combat.No Man\'s Sky is a constantly evolving game, and there is always something new to explore. If you are looking for a game that offers endless possibilities for adventure, then No Man\'s Sky is definitely worth checking out.', '\"Dive into limitless exploration and boundless adventure in No Man\'s Sky – where galaxies await your discovery, and every planet tells a unique tale.\"', 8, '64-bit Windows 10', 'Intel Core i3.', '10 GB', '2016-08-09'),
('NUNA120', 'MultiVersus', 'Player First Games', 'Warner Bros. Games', 'Fighting game ,  Platform game', 0.00, '6 GB', 1, 'MultiVersus, a free-to-play platform fighting game that ignites the arena with an eclectic assembly of characters plucked from diverse Warner Bros. realms. Engage in electrifying 2v2 skirmishes, uniting with a friend or AI ally to clash against rival teams. With its versatile array of game modes, ranging from the standard 2v2 face-off to the frenetic 4-player free-for-all frenzy and even a cooperative venture, MultiVersus ensures no shortage of thrilling showdowns. Applauded for its seamless gameplay, dynamic graphics, and an expansive cast of characters, MultiVersus catapults you into a realm where battles blaze with intensity and color.', '\"MultiVersus – Heroes in explosive 2v2 battles and wild free-for-alls. Dive into a realm where gameplay flows like magic and characters collide in a riot of color and chaos.\"', 4, 'Windows 7 or Higher', 'Intel Core i5-2300', '7 GB', '2022-07-19'),
('NUNA121', 'Uno', 'Carbonated Games (XBLA) Gameloft Ubisoft', 'Microsoft Game Studios', 'Card Game', 0.00, '2 GB', 1, 'One of the most iconic classic games which we all grew to know and love! UNO makes its return with an assortment of exciting \r\nnew features such as added video chat support and an all new theme system which adds more fun! Match cards either by matching \r\ncolor or value and play action cards to change things up ...', 'Wild cards, strategies hard – UNO PC game, a battle of cards.\r\nSkip, reverse, action diverse – UNO on your screen, excitement immerse.', 4, 'Windows 7 or Higher', '​Intel Pentium G860 @ 3 GHz, AMD FX-4150', '2 GB', '2016-12-08'),
('NUNA122', 'Garena Free Fire', 'Garena', 'Garena', 'Battle Royale , Action Game , Multiplayer', 0.00, '4 GB', 1, 'In Free Fire, players control a character in a third-person perspective and use a joystick to move. \r\nThe fire button allows them to shoot and throw items. The character can perform actions such as jumping, crawling, and \r\nlying down. During gameplay, players can utilize the \"Gloo Wall\" grenade as a form of cover to protect against damage.\r\nFree Fire offers over 15 game modes, including Team Deathmatch, Clash Squad, Big Head, Explosive Jump, Cold Steel, \r\nRampage, and Pet Mania. However, modes other than Battle Royale, Clash Squad, and Lone Wolf are only available during \r\nspecial events.\r\nThe Battle Royale mode in Free Fire accommodates up to 52 players landing on an island without weapons. \r\nThey must fight to be the last one standing by scavenging weapons and equipment from buildings. Playing this mode in ranked \r\nmode will affect their ranking. There are 6 maps to choose from: Bermuda, Bermuda Remastered, Kalahari, Purgatory, Alpine, \r\nand NeXTerra. The mode allows for solo, duo, or squad play.', '\"Joystick dance, character\'s grace, in Free Fire\'s world, survival\'s embrace.\r\n\"Shoot and throw, actions diverse, Free Fire\'s moves, endless verse.\"', 2, '32-bit Windows 7 or Higher', 'Any dual-core processor with at least 2G', '4 GB', '2017-12-08'),
('NUNA123', 'Wolfenstein Youngblood', 'MachineGames , Arkane Studios', 'Bethesda Softworks', 'Action-Adventure, First Person Shooter', 1399.00, '40 GB', 1, '\'Wolfenstein: Youngblood,\' step into the shoes of Jess and Soph Blazkowicz, twin daughters of BJ Blazkowicz, on a mission to find their missing father in an alternate reality 1980s Paris. This co-op first-person shooter offers intense action, challenging missions, and a dynamic combat system. Team up with a friend or an AI companion for an adrenaline-pumping adventure through Nazi-occupied Paris, where every battle counts. Customize your weapons, enhance your abilities, and dismantle the oppressive regime. Explore the city, uncover secrets, and resist the enemy in this high-octane addition to the Wolfenstein franchise.', '\"Wolfenstein: Youngblood\" is a co-op focused first-person shooter that takes place in an alternate history 1980s Paris, where you play as BJ Blazkowicz\'s twin daughters, Jess and Soph, on a mission to find their missing father.', 8, 'Windows 7 / 10 (64-bit version', 'AMD FX-8350 / Ryzen 5 1400 or Intel Core', '40 GB', '2019-07-26'),
('UNA100', 'Minecraft', 'Mojang Studios', ' Mojang Studios', '3D sandbox game, Open-World Game', 500.00, '1 GB', 0, 'Minecraft is a 3-D computer game where players can build anything. The game which has been described as like an online Lego involves building blocks andcreating structures across different environments and terrains. Set in a virtual worldthe game involves resource gathering, crafting items, building, and combat. ', '\"Minecraft: The Ultimate 3D Building Adventure! Unleash Your Imagination in a Virtual World of Endless Possibilities, Crafting, and Exploration.\"', 2, '64-bit Windows 10 or Higher', ' Intel i7-6500U / AMD A8-6600K or better', ' 1 GB', '2011-11-01'),
('UNA101', 'Monopoly', 'Ubisoft Pune', 'Hasbro Parker Brothers Waddington', 'Board game', 0.00, '2 GB', 1, 'Monopoly is a multi-player economics-themed board game. In the game, players roll two dice to move around the game board, buying and trading \r\nproperties and developing them with houses and hotels. Players collect rent from their opponents and aim to drive them into bankruptcy. Money can also \r\nbe gained or lost through Chance and Community Chest cards and tax squares. Players receive a salary every time they pass \"Go\" and can end up in jail, \r\nfrom which they cannot move until they have met one of three conditions. House rules, hundreds of different editions, many spin-offs, and related media \r\nexist.', '\"Roll the dice, seize your slice – Monopoly\'s economic thrill!\"\r\n\"Buy, trade, build – conquer the Monopoly board, be skilled.\"\r\n\"Collect rent, bankrupt foes – victory\'s how the story goes!\"', 8, 'Windows 7 or Higher', 'Intel Core i5- 2400 @ 3.1 GHz or AMD FX-', '2 GB', '2014-11-25'),
('UNA102', 'Hive', 'John Yianni ', 'Gen42 Games', 'Tabletop Abstract Strategy Game', 0.00, '300 MB', 1, 'The object of Hive is to capture the opponent\'s queen bee by allowing it to become completely surrounded \r\nby other pieces (belonging to either player), while avoiding the capture of one\'s own queen.\r\nHive shares elements of both tile-based games and board games. It differs from other tile-based games in that \r\nthe tiles, once placed, can then be moved to other positions according to various rules, much like chess pieces.', '\"Queen trapped tight, victory in sight – Hive\'s challenge, day or night.\"\r\n\"Surround and seize, a royal tease – Hive\'s tactics, aim to please.\"\r\n\"Tiles in play, strategic sway – Hive\'s moves like chess, make your way.\"', 1, 'Windows XP or Higher', 'Intel Pentium 4 2.00GHz.', '300 MB', '2001-01-01'),
('UNA103', 'Kerbal Space Program', 'Squad', 'Space flight Simulation', 'Space Flight - Simulation , Simulation', 849.00, '3 GB', 1, 'The player administers a space program operated by Kerbals, a species of small green humanoids, who have constructed \r\na spaceport on their home planet of Kerbin. From the space center players can build various vehicles such as rockets, \r\naircraft, spaceplanes, and rovers from a provided set of components. Constructed craft can be launched from the space \r\ncenter\'s launch pad or runway to accomplish various tasks while avoiding partial or catastrophic failure\r\n(such as lack of fuel or structural failure). Players control flight with little assistance other than a Stability Assist System \r\n(SAS) to keep their rocket oriented.[13] Provided it maintains sufficient thrust and fuel, a spacecraft can enter orbit or even \r\ntravel to other celestial bodies. To visualize vehicle trajectories, the player is provided a \'map\' mode that displays the current \r\nvehicle\'s trajectory as well as that of celestial bodies and other spacecraft, as well as their orbital parameters.', 'Launch into fun with Kerbals: The universe is your playground, and failure is just the first step to success,\r\nBuild, Launch, Conquer: Kerbals empower you to create the ultimate space odyssey.', 4, 'Windows 7 or Higher', 'Core 2 Duo 2.0 Ghz.', '3 GB', '2015-04-27'),
('UNA104', 'Astroneer', 'System Era Softworks', 'System Era Softworks', 'Sandbox, Adventure', 1499.00, '2 GB', 1, 'Astroneer is a sandbox adventure game played from a third-person view. Its open world planets, wherein terraforming \r\ncan take place, are subject to procedural generation, with the exception of some planet specific resources. The player controls \r\nan astronaut (called an Astroneer) who navigates on foot, by rover, through teleportation, or by spacecraft.', '\"Explore cosmos vast, in Astroneer\'s grasp, a sandbox saga, adventure amassed.\r\nThird-person gaze, planets arise, Astroneer\'s universe, before your eyes.\"', 4, '64-bit Windows 7 or Higher', 'X64 Dual Core CPU, 2+ GHz.', '2 GB', '2019-02-06'),
('UNA105', 'Stardew Valley', 'ConcernedApe', 'ConcernedApe', 'Simulation , Role-Playing', 449.00, '500 MB', 1, 'Stardew Valley is a farming simulation game primarily inspired by Story of Seasons, a series by Marvelous and previously \r\nknown as Harvest Moon.At the start of the game, players create a character, who inherits a plot of land and a small house \r\nonce owned by their grandfather in a small village called Pelican Town, located in the titular Stardew Valley. Players may select \r\nfrom several different farm types, each with a unique theme and different benefits and drawbacks.The farmland is initially \r\noverrun with boulders, trees, stumps, and weeds, and players must work to clear them to restart the farm, tending to crops and \r\nlivestock to generate revenue and further expand the farm.', '\"From Harvest Moon\'s legacy, Stardew Valley did arise, a farming fantasy that will mesmerize.\r\nPelican Town awaits, in Stardew\'s embrace, a village to nurture, a life to chase.\"', 2, 'Windows Vista/7/8.1/10', '2 Ghz', '500 MB', '2016-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`category`) VALUES
('3D sandbox games'),
('Action'),
('Action Role-Play'),
('Action-Adventure'),
('Battle Arena'),
('Battle Royale'),
('Board Game'),
('Card Game'),
('City-building'),
('Construction and Management Simulation'),
('Educational Video Game'),
('Fighting'),
('First Person Shooter'),
('Horror'),
('Multiplayer Online Battle Arena (MOBA)'),
('Open World'),
('Puzzle-Platform'),
('Racing'),
('Real-time Grand Strategy'),
('Real-time Strategy'),
('Science-Fiction'),
('Simulation'),
('Survival'),
('Survival Adventure'),
('Survival Horror'),
('Tactical Shooter');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(8) NOT NULL,
  `customerid` int(8) DEFAULT NULL,
  `billid` int(8) DEFAULT NULL,
  `netamount` int(11) DEFAULT NULL,
  `contact_no` varchar(13) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`,`gameid`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`,`gameid`),
  ADD KEY `fk_cart_games` (`gameid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameid`),
  ADD UNIQUE KEY `gamename_UNIQUE` (`gamename`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD UNIQUE KEY `unique_category` (`category`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `billid` (`billid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerid`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_games` FOREIGN KEY (`gameid`) REFERENCES `games` (`gameid`),
  ADD CONSTRAINT `fk_gameid` FOREIGN KEY (`gameid`) REFERENCES `games` (`gameid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkgameid` FOREIGN KEY (`gameid`) REFERENCES `games` (`gameid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
