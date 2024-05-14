-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 05 mai 2024 à 14:15
-- Version du serveur : 8.2.0
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vparrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `avis` text NOT NULL,
  `note` int NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_post` varchar(255) NOT NULL,
  PRIMARY KEY (`id_avis`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `firstname`, `avis`, `note`, `status`, `date_post`) VALUES
(20, 'Jean-pierre', 'Super garagiste, mais parfois un peu cher, dommage.', 4, 'valid', '28/04/2024'),
(16, 'gregory', 'Garage au top !', 5, 'valid', '03/05/2024'),
(17, 'Robert', 'Vendeur sympathique, pas cher !', 4, 'valid', '03/05/2024'),
(18, 'José', 'Les mécanos sont pros !', 4, 'valid', '03/05/2024'),
(19, 'Alain', 'Mr Parrot est le seul garagiste à avoir réussi à réparer mon véhicule.', 5, 'valid', '01/05/2024');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id_img` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `path_img` varchar(255) NOT NULL,
  `id_current_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id_img`),
  KEY `id_current_img` (`id_current_img`)
) ENGINE=MyISAM AUTO_INCREMENT=317 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_img`, `name`, `path_img`, `id_current_img`) VALUES
(312, '6616672d9cec2.peugeot 508 4.jpg', '../upload_img/6616672d9cec2.peugeot 508 4.jpg', '6616672d9c78d2.40510850'),
(311, '6616672d9cbe2.peugeot 508 3.jpg', '../upload_img/6616672d9cbe2.peugeot 508 3.jpg', '6616672d9c78d2.40510850'),
(310, '6616672d9c811.peugeot 508 2.jpg', '../upload_img/6616672d9c811.peugeot 508 2.jpg', '6616672d9c78d2.40510850'),
(309, '661666a2b0b65.ford f150 4.jpg', '../upload_img/661666a2b0b65.ford f150 4.jpg', '661666a2b04c85.46566421'),
(308, '661666a2b088e.ford f150 3.jpg', '../upload_img/661666a2b088e.ford f150 3.jpg', '661666a2b04c85.46566421'),
(307, '661666a2b04eb.ford f150 2.jpg', '../upload_img/661666a2b04eb.ford f150 2.jpg', '661666a2b04c85.46566421'),
(306, '6616662c05d95.dacia spring3.jpg', '../upload_img/6616662c05d95.dacia spring3.jpg', '6616662c054e63.98090079'),
(305, '6616662c05abb.dacia spring2.jpg', '../upload_img/6616662c05abb.dacia spring2.jpg', '6616662c054e63.98090079'),
(304, '6616662c05511.dacia spring1.jpg', '../upload_img/6616662c05511.dacia spring1.jpg', '6616662c054e63.98090079'),
(303, '6616658e91038.audi rs6 4.jpg', '../upload_img/6616658e91038.audi rs6 4.jpg', '6616658e908672.89143577'),
(302, '6616658e90c6c.audi rs6 3.jpg', '../upload_img/6616658e90c6c.audi rs6 3.jpg', '6616658e908672.89143577'),
(301, '6616658e908b5.audi rs6 1.jpg', '../upload_img/6616658e908b5.audi rs6 1.jpg', '6616658e908672.89143577'),
(300, '66166518287d7.porsche 718 4.jpg', '../upload_img/66166518287d7.porsche 718 4.jpg', '66166518281170.14929546'),
(299, '661665182854a.porsche 718 3.jpg', '../upload_img/661665182854a.porsche 718 3.jpg', '66166518281170.14929546'),
(298, '6616651828144.porsche 718 1.jpg', '../upload_img/6616651828144.porsche 718 1.jpg', '66166518281170.14929546'),
(297, '661664a01525c.octavia4.jpg', '../upload_img/661664a01525c.octavia4.jpg', '661664a014baf6.79728558'),
(296, '661664a014f93.octavia3.jpg', '../upload_img/661664a014f93.octavia3.jpg', '661664a014baf6.79728558'),
(295, '661664a014bd3.octavia2.jpg', '../upload_img/661664a014bd3.octavia2.jpg', '661664a014baf6.79728558'),
(294, '66166440b54ae.audi q5 4.jpg', '../upload_img/66166440b54ae.audi q5 4.jpg', '66166440b4ce96.24568732'),
(293, '66166440b51c9.audi q5 3.jpg', '../upload_img/66166440b51c9.audi q5 3.jpg', '66166440b4ce96.24568732'),
(291, '661663c97b0df.tesla4.jpg', '../upload_img/661663c97b0df.tesla4.jpg', '661663c97a9666.10647014'),
(292, '66166440b4d67.audi q5 2.jpg', '../upload_img/66166440b4d67.audi q5 2.jpg', '66166440b4ce96.24568732'),
(290, '661663c97ae04.tesla2.jpg', '../upload_img/661663c97ae04.tesla2.jpg', '661663c97a9666.10647014'),
(289, '661663c97a992.tesla1.jpg', '../upload_img/661663c97a992.tesla1.jpg', '661663c97a9666.10647014'),
(288, '6616630318bc6.glc4.jpg', '../upload_img/6616630318bc6.glc4.jpg', '66166303184722.29247980'),
(287, '6616630318870.glc3.jpg', '../upload_img/6616630318870.glc3.jpg', '66166303184722.29247980'),
(286, '66166303184b7.glc1.jpg', '../upload_img/66166303184b7.glc1.jpg', '66166303184722.29247980'),
(285, '661662821320f.bmw serie4 4.jpg', '../upload_img/661662821320f.bmw serie4 4.jpg', '6616628212ad23.12905207'),
(284, '6616628212e9f.bmw serie4 2.jpg', '../upload_img/6616628212e9f.bmw serie4 2.jpg', '6616628212ad23.12905207'),
(283, '6616628212b2e.bmw serie4 1.jpg', '../upload_img/6616628212b2e.bmw serie4 1.jpg', '6616628212ad23.12905207'),
(282, '661661f4d26d6.jeep compass4.jpg', '../upload_img/661661f4d26d6.jeep compass4.jpg', '661661f4d20560.57646165'),
(281, '661661f4d242f.jeep compass3.jpg', '../upload_img/661661f4d242f.jeep compass3.jpg', '661661f4d20560.57646165'),
(280, '661661f4d20b2.jeep compass2.jpg', '../upload_img/661661f4d20b2.jeep compass2.jpg', '661661f4d20560.57646165'),
(277, '6616606609ffa.porsche 911 1.jpg', '../upload_img/6616606609ffa.porsche 911 1.jpg', '6616606609eba2.36515779'),
(278, '661660660a411.porsche 911 2.jpg', '../upload_img/661660660a411.porsche 911 2.jpg', '6616606609eba2.36515779'),
(279, '661660660a6d5.porsche 911 4.jpg', '../upload_img/661660660a6d5.porsche 911 4.jpg', '6616606609eba2.36515779');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=1911 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `name`, `firstname`, `mail`, `message`) VALUES
(1, 'Doe', 'Jean-claude', 'jc@gmail.com', 'Bonjour, il me faut un devis.'),
(1910, 'Luther', 'john', 'bourdon@gmail.com', 'Slt ça va?');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id_options` int NOT NULL AUTO_INCREMENT,
  `exterieur` text,
  `interieur` text,
  `securite` text,
  `confort` text,
  `id_current` varchar(100) NOT NULL,
  PRIMARY KEY (`id_options`),
  KEY `id_current` (`id_current`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id_options`, `exterieur`, `interieur`, `securite`, `confort`, `id_current`) VALUES
(52, 'Phares &agrave; allumage automatique\r\nAmpoules de phares LED\r\nFreins r&eacute;g&eacute;n&eacute;rateurs\r\nFeux arri&egrave;res &agrave; LED\r\nR&eacute;troviseurs ext&eacute;rieurs r&eacute;glage &eacute;lectrique\r\nFeux de route &agrave; LED\r\nFeux clignotants &agrave; LED\r\nPhares directionnels\r\nFeux de route actifs\r\nFeux de croisement &agrave; LED\r\nR&eacute;troviseurs ext&eacute;rieurs chauffants\r\nR&eacute;troviseurs rabattables &eacute;lectriquement', 'Syst&egrave;me audio &eacute;cran tactile, carte digitale\r\nPalettes au volant\r\nAir conditionn&eacute; auto\r\nSyst&egrave;me de navigation\r\nBluetooth inclut musique en streaming\r\nR&eacute;gulateur de vitesse\r\nSmart card / Smart key\r\nVolant cuir\r\nAide au stationnement arri&egrave;re\r\nOrdinateur de bord\r\nSi&egrave;ge avant &eacute;lectrique\r\nTapis de sol\r\nOuverture du coffre &agrave; distance\r\nTaille &eacute;cran navigation 10.9 pouces\r\nAccoudoir central avant\r\nSyst&egrave;me de navigation info trafic\r\nLimiteur de vitesse\r\nR&eacute;troviseur jour/nuit\r\nVolant multi-fonction\r\nR&eacute;seau Wifi\r\nBluetooth\r\nReconnaissance vocale\r\n12 haut-parleurs\r\nAir conditionn&eacute; 2 zones\r\nR&eacute;glage du volant en hauteur, &eacute;lectrique, en profondeur\r\nTaille &eacute;cran multi-fonctions 7 pouces', '6 airbags\r\nESP\r\nSyst&egrave;me d&eacute;tection de collision\r\nLave-phares\r\nIndicateur de sous-gonflage des pneus\r\nAssistance au freinage d\'urgence\r\nEssuie glace capteur de pluie\r\nAntipatinage\r\nProtection anti-retournement Arceaux dissimul&eacute;s\r\nFreins c&eacute;ramique\r\nABS\r\nAirbags lat&eacute;raux\r\nAide au d&eacute;marrage en c&ocirc;te', 'Acc&egrave;s Confort\r\nAffichage des limitations de vitesse avec assistance de changement de voie\r\nAssistance angles morts\r\nAssistance parking avant et arri&egrave;re avec cam&eacute;ra de recul et vue 360&deg;\r\nBaguettes de seuils de porte en carbone, illumin&eacute;es\r\nBo&icirc;te de vitesse Porsche Doppelkupplung (PDK) - 8 rapports\r\nCeintures de s&eacute;curit&eacute; Craie\r\nColonne de direction en cuir\r\nEntr&eacute;es d\'air lat&eacute;rales peintes en Noir (finition brillante)\r\nGrille d&rsquo;a&eacute;ration arri&egrave;re avec lamelles verticales en Noir (finition brillante)\r\nHomeLink (syst&egrave;me d\'ouverture de porte de garage), 315 MHz\r\nInt&eacute;rieur tout cuir\r\nJantes 911 Turbo 20/21 pouces\r\nLogo PORSCHE peint en Noir\r\nPack luminosit&eacute;\r\nPack SportDesign 911 Turbo peint en Noir (finition brillante)', '6616606609eba2.36515779'),
(53, 'Logo Jeep, Compass et S Granite Crystal\r\nBarres de toit\r\nTrappe de carburant &agrave; verrouillage &eacute;lectrique\r\nToit noir\r\nCalandre noir avec cerclages d\'ou&iuml;es Granite Crystal\r\nTransmission int&eacute;grale eAWD avec Selec-Terrain et mode Sport\r\nFinitions ext&eacute;rieures Granite Crystal\r\nJantes alliage 19&quot; Granite Crystal, Pneumatiques 3 saisons 235/45 R19\r\nSortie d\'&eacute;chappement chrom&eacute;e', 'Climatisation automatique bi-zone avec pr&eacute;-conditionnement et a&eacute;rateurs aux places AR\r\nFrein de stationnement &eacute;lectrique avec aide au d&eacute;marrage en c&ocirc;te\r\nPare-soleil coulissant avec mirroirs de courtoisie &eacute;clair&eacute;\r\nVolant gain&eacute; de cuir\r\nPack Cuir\r\nEssuie-glaces automatiques (capteurs de pluie)\r\nModule de connectique : Prise jack, Port USB et lecteur de carte SD\r\nSyst&egrave;me audio Premium Alpine\r\nHayon &eacute;lectrique\r\nBanquette AR 40/20/40 rabattable &agrave; plat\r\nVitres et lunettes AR surteint&eacute;es\r\nToit ouvrant panoramique CommandView\r\nPack Hiver\r\nR&eacute;troviseurs ext&eacute;rieurs d&eacute;givrants, r&eacute;glables et rabattables &eacute;lectriquement\r\nRadio DAB\r\nSyst&egrave;me d\'aide &agrave; la descente (Hill Descent Control)\r\nSyst&egrave;me pr&eacute;ventif anti retournement (ERM)\r\nCommandes audio au volant\r\nR&eacute;troviseur int&eacute;rieur photochromatique\r\nOrdinateur de bord &agrave; &eacute;cran 7\'\' TFT couleur\r\nPrise 230 V &agrave; l\' AR\r\nApple Carplay / Android Auto\r\nServices Uconnect avec fonctionalit&eacute;s hybrides rechargeables d&eacute;di&eacute;es\r\nSyst&egrave;me de navigation GPS Uconnect 3D avec &eacute;cran tactile 8,4&quot;\r\nEnter-N-Go : syst&egrave;me d\'ouverture et de d&eacute;marrage sans cl&eacute;\r\nSi&egrave;ge passager avec r&eacute;glage lombaire &eacute;lectrique', 'E-Coasting: simule du frein moteur en r&eacute;cup&eacute;rant de l\'&eacute;nergie\r\nSyst&egrave;me anti-patinage des 4 roues par action sur les freins\r\nSyst&egrave;me de surveillance des angles mort\r\nAide au stationnement AV\r\nProjecteurs AR &agrave; Signature LED\r\nProjecteurs bi-x&eacute;non\r\nAirbag passager neutralisable\r\nCam&eacute;ra de recul Parkview avec affichage dynamique\r\nR&eacute;gulateur et limiteur de vitesse &eacute;lectronique\r\nEclairage de courtoisie dans les r&eacute;troviseurs ext&eacute;rieurs\r\nAppuis-t&ecirc;te AV actifs syst&egrave;me de protection contre le coup du lapin\r\nProjecteurs antibrouillard AV avec &eacute;clairage d\'intersection\r\nProjecteurs AV avec Signature &agrave; LED et cerclage chrom&eacute;\r\nSyst&egrave;me Park Assist : Assistance au stationnement parall&egrave;le/perpendiculaire semi-automatique avec assistance &agrave; la sortie\r\nAirbags frontaux\r\nCapteur de luminosit&eacute; (Allumage des feux automatique)\r\nAirbags rideaux\r\nAvertisseur de baisse de pression des pneus\r\nProjecteurs antibrouillard AR\r\nSyst&egrave;me anticollision actif\r\nSyst&egrave;me de d&eacute;tection de pr&eacute;sence AR\r\n3 ceintures ar. 3 points\r\n3e feu stop\r\n4 airbags\r\nABS\r\nAFU\r\nAide au d&eacute;marrage en c&ocirc;te\r\nAirbag frontal\r\nAirbags\r\nAirbags front. + lat.\r\nAirbags lat&eacute;raux\r\nAirbags lat&eacute;raux ar.\r\nAlerte franchissement ligne\r\nProjecteurs antibrouillard\r\nAvertisseur d\'angle mort\r\nConnexion SOS\r\nContr&ocirc;le de pression des pneus\r\nD&eacute;tecteur de pluie\r\nEssuie-glaces automatiques\r\nFeux ar. &agrave; LED\r\nFeux automatiques\r\nFeux et essuie-glaces automatiques\r\nFixations ISOFIX\r\nKit t&eacute;l&eacute;phone main libre bluetooth\r\nPhares adaptatifs\r\nPhares av. de jour\r\nPhares av. de jour &agrave; LED\r\nRadar anti-collision', 'Allume-cigares / cendrier\r\nC&acirc;ble type 2 - recharge domestique\r\nC&acirc;ble type 2 mode 3 - recharge publique\r\nColoris m&eacute;tallis&eacute; Blue Shade avec toit Noir\r\nKit de gonflage (Fix &amp; Go) avec notice en fran&ccedil;ais\r\nKit de r&eacute;paration crevaison\r\nModes EV : Hybride, &Eacute;lectrique, eSave\r\nNon fumeur\r\nSi&egrave;ges ventil&eacute;s en Cuir\r\nSyst&egrave;me anti-louvoiement en conditions de tractage', '661661f4d20560.57646165'),
(54, 'El&eacute;ments ext&eacute;rieurs (poign&eacute;es de portes et baguettes de toit) couleur carrosserie\r\nD&eacute;signation du mod&egrave;le sur la malle &agrave; droite\r\nJantes en alliage l&eacute;ger 18\'\' style 858 M bicolores &agrave; rayons doubles 8,5 J x 18 / pneus 245/45 R 18\r\nTurbocompresseur Twin Scroll et commande Double VANOS et Valvetronic &agrave; g&eacute;om&eacute;trie variable\r\nD&eacute;signation du mod&egrave;le sur la malle &agrave; gauche\r\nBo&icirc;te de vitesses automatique 8 rapports\r\nSeuils de portes avec inscription BMW\r\nSortie d\'&eacute;chappement simple &agrave; gauche et &agrave; droite de 90 mm\r\nR&eacute;troviseurs ext&eacute;rieurs couleur carrosserie et chauffants avec rappels de clignotants int&eacute;gr&eacute;s\r\nInserts d&eacute;coratifs Aluminium Tetragon soulign&eacute;s de chrome perl&eacute;\r\nGrilles de calandre &quot;Mesheffect&quot; avec p&eacute;pites en aluminium et cadres en chrome brillant\r\nPack A&eacute;rodynamique M\r\nTeinte de carrosserie unie (Alpinweiss)\r\nShadow Line M brillant\r\nSuspension DirectDrive\r\nConnexion multiple de t&eacute;l&eacute;phones\r\nAide parking avec cam&eacute;ra de recul\r\nJantes alu 19&quot;\r\nJantes noires\r\nPack M\r\nPeinture m&eacute;tallis&eacute;e\r\nR&eacute;troviseurs rabattables &eacute;lectriquement', 'Appel d\'Urgence Intelligent (dur&eacute;e de vie de la voiture)\r\nAccoudoir central AV\r\nProtection active des pi&eacute;tons\r\n2 porte-gobelets sur la console centrale\r\nVerrouillage centralis&eacute; des portes, coffre et trappe &agrave; essence\r\nSellerie Alcantara / Similicuir Sensatec &quot;Schwarz&quot; avec surpiq&ucirc;res contrastantes Bleues\r\nKit Eclairage\r\nEclairage d\'accueil\r\nSyst&egrave;me audio 6 HP\r\nBanquette AR rabattable 40/20/40\r\nClimatisation automatique 3 zones\r\nFilets au dos des si&egrave;ges AV et dans le coffre &agrave; bagages, &agrave; gauche et &agrave; droite\r\nTuner DAB\r\n2 prises USB de type C dans la console centrale sur la partie arri&egrave;re\r\nConnectivit&eacute; avanc&eacute;e avec recharge sans fil par induction\r\nVitres avec protection contre la chaleur et le soleil\r\nTapis en velours\r\nBMW Live Cockpit Navigation Pro\r\nFrein de parking &eacute;lectrique avec fonction &quot;Automatic Hold&quot;\r\nAnneaux d\'arrimage dans le coffre\r\nInterface Bluetooth pour t&eacute;l&eacute;phone portable\r\nPare-brise acoustique\r\nTriangle de pr&eacute;signalisation avec kit de premiers secours\r\nD&eacute;tecteur de pluie et allumage automatique des projecteurs\r\n5 places\r\nR&eacute;troviseur int&eacute;rieur &eacute;lectrochrome\r\nKit rangement\r\nVolant M gain&eacute; cuir\r\nOrdinateur de bord avec Check-Control et indicateur de temp&eacute;rature ext&eacute;rieure\r\nHotspot Wi-Fi', 'Mesure individuelle de pression des pneumatiques\r\nPark Assist\r\nFeux de croisement et feux de route &agrave; technologie Bi-LED\r\nAppuis-t&ecirc;te AV r&eacute;glables en hauteur\r\nAirbags de t&ecirc;te AV et AR\r\nFeux de jour et clignotants AV et AR &agrave; technologie LED\r\nPr&eacute;paration pour feux de route anti-&eacute;blouissement\r\nFeux anti brouillard AR &agrave; LED\r\nSyst&egrave;me anti-collision &agrave; basse vitesse\r\nActive Guard Plus\r\nContr&ocirc;le dynamique de stabilit&eacute; DSC\r\nContr&ocirc;le dynamique de traction DTC\r\nAirbags lat&eacute;raux AV\r\nAirbag passager d&eacute;sactivable via la cl&eacute;\r\nFixations ISOFIX aux places AR\r\nFeux AR LED\r\nServices Apr&egrave;s-vente connect&eacute;s BMW TeleServices (dur&eacute;e de vie de la voiture)\r\nSyst&egrave;me de r&eacute;cup&eacute;ration de l\'&eacute;nergie au freinage\r\nAppuis-t&ecirc;te AR\r\nContr&ocirc;le de freinage en courbe CBC\r\nABS, y compris assistant de freinage\r\nAvertisseur de franchissement de ligne avec intervention dans la direction\r\nR&eacute;gulateur de vitesse avec fonction de freinage et limiteur de vitesse\r\nAirbags frontaux conducteur et passager\r\nAirbags\r\nAlerte franchissement ligne\r\nContr&ocirc;le de pression des pneus\r\nEssuie-glaces automatiques\r\nFeux automatiques\r\nPhares av. de jour &agrave; LED', 'Syst&egrave;me d\'entr&eacute;e sans clef\r\nBluetooth\r\nVirtual cockpit', '6616628212ad23.12905207'),
(55, 'Phares &agrave; allumage automatique\r\nAmpoules de phares led\r\nFeux arri&egrave;res &agrave; LED\r\nR&eacute;troviseurs ext&eacute;rieurs r&eacute;glage &eacute;lectrique\r\nFeux de route &agrave; LED\r\nR&eacute;troviseurs ext&eacute;rieurs chauffants\r\nR&eacute;troviseurs rabattables &eacute;lectriquement', 'Syst&egrave;me audio carte digitale, CD\r\nPalettes au volant\r\nInformation trafic\r\nFermerture &eacute;lectrique du coffre\r\nAir conditionn&eacute; auto\r\nSyst&egrave;me de navigation\r\nSyst&egrave;me audio lecteur CD et MP3\r\nConnexion Internet\r\nBluetooth inclut musique en streaming, connexion t&eacute;l&eacute;phone\r\nR&eacute;gulateur de vitesse\r\nSmart card / Smart key\r\nVolant alu &amp; cuir\r\nSyst&egrave;me audio inclut DVD\r\nAide au stationnement arri&egrave;re, avant\r\nOrdinateur de bord\r\nSi&egrave;ge avant &eacute;lectrique\r\nTapis de sol\r\nOuverture du coffre &agrave; distance\r\nTaille &eacute;cran navigation 7 pouces\r\nAccoudoir central arri&egrave;re, avant\r\nLimiteur de vitesse\r\nR&eacute;troviseur jour/nuit\r\nVolant multi-fonction\r\nR&eacute;seau Wifi\r\nBluetooth\r\nReconnaissance vocale\r\n5 haut-parleurs\r\nAir conditionn&eacute; 3 zones\r\nSi&egrave;ge avant chauffant\r\nR&eacute;glage du volant en hauteur, en profondeur\r\nTaille &eacute;cran multi-fonctions 7 pouces', '7 airbags\r\nESP\r\nAirbags rideaux\r\nContr&ocirc;le de freinage en courbe\r\nD&eacute;tection panneaux signalisation\r\nSyst&egrave;me d&eacute;tection de collision\r\nLave-phares\r\nIndicateur de sous-gonflage des pneus\r\nAssistance au freinage d\'urgence\r\nKit anticrevaison\r\nEssuie glace capteur de pluie\r\nCapot &agrave; soul&egrave;vement pour choc pi&eacute;ton\r\nAntipatinage\r\nCapteur d\'angle mort\r\nABS\r\nAirbags lat&eacute;raux\r\nAide au d&eacute;marrage en c&ocirc;te', 'Affichage t&ecirc;te haute\r\nCam&eacute;ra 360&deg;: 4 cam&eacute;ras digitales (avant, arri&egrave;re et c&ocirc;t&eacute;s)\r\nDISTRONIC PLUS : r&eacute;gulateur de vitesse et de distance\r\nPack d\'assistance &agrave; la conduite Plus : DISTRONIC PLUS (r&eacute;gulateur devitesse et de distance avec frein PRE-SAFE&reg;), freinage d\'urgence BASPLUS, avertisseur de franchissement de ligne actif, d&eacute;tecteur d\'anglemort actif, assistant de carrefour, assistan\r\nPack designo Noir\r\nSi&egrave;ge conducteur &agrave; r&eacute;glages &eacute;lectriques avec fonction M&eacute;moires\r\nSi&egrave;ge passager avant &agrave; r&eacute;glages &eacute;lectriques avec fonction M&eacute;moires\r\nSi&egrave;ges avant climatis&eacute;s (chauffants et ventil&eacute;s)\r\nSyst&egrave;me de sonorisation Surround Burmester&reg; : 13 haut-parleurs, 590watts, technologie Frontbass, fonction Surround et Dolby Digital 5.1/DTS\r\nToit ouvrant panoramique &eacute;lectrique en verre', '66166303184722.29247980'),
(56, 'Ouverture automatique sans cl&eacute;\r\nPeinture Multicouches Pearl White\r\nPortes AV s\'ouvrant &agrave; l\'approche\r\nPortes Falcon permettent d\'acc&eacute;der facilement aux si&egrave;ges des 2-&egrave;me et 3-&egrave;me rang&eacute;es', 'Configuration 7PL\r\nPremium Interior - Black\r\nPremium Interior - Black &amp; White', 'Technologies de s&eacute;curit&eacute; active, y compris l\'&eacute;vitement des collisions et le freinage automatique d\'urgence\r\nTransmission int&eacute;grale &eacute;lectrique pour une efficacit&eacute; et une traction optimale', 'Volant chauffant\r\nSyst&egrave;me de filtration de l\'air HEPA\r\nSi&egrave;ges chauffants dans l\'ensemble du v&eacute;hicule\r\nSuspension Smart Air', '661663c97a9666.10647014'),
(57, 'Tire Mobility System\r\nS tronic : bo&icirc;te s&eacute;quentielle 7 vitesses &agrave; double embrayage avec commande &eacute;lectrohydraulique\r\nCh&acirc;ssis de s&eacute;rie\r\nPr&eacute;paration pour crochet d\'attelage\r\nMoulures de seuils avec insert en Argent S&eacute;l&eacute;nite AV\r\nQuattro transmission int&eacute;grale permanente\r\nFinition ext&eacute;rieure Design\r\nBlocage de diff&eacute;rentiel auto.\r\nJantes alu 21&quot;\r\nLave-phares\r\nR&eacute;troviseurs rabattables &eacute;lectriquement\r\nSuspension pneumatique\r\nToit panoramique', 'Banquette AR plus\r\nEl&eacute;ments de l\'habitacle en Similicuir\r\nVitrage acoustique pour les vitres de porti&egrave;res AV\r\nAffichage t&ecirc;te haute\r\nSi&egrave;ges normaux\r\nTrousse de secours et triangle de pr&eacute;signalisation\r\nSi&egrave;ges AV r&eacute;glables &eacute;lectriquement avec fonction m&eacute;moire pour les si&egrave;ges conducteur\r\nAppel d\'urgence avec service Audi connect + commande de v&eacute;hicule\r\nNavigation MMI plus avec MMI touch\r\nR&eacute;troviseur int&eacute;rieur jour/nuit automatique sans encadrement (Frameless)\r\nVitres athermiques\r\nOutillage de bord (sans cric)\r\nClimatisation stationnaire\r\nAudi connect avec carte SIM int&eacute;gr&eacute;e (e-SIM) et licence d\'utilisation pour 3 ans\r\nSurfaces d&rsquo;accentuation fa&ccedil;on verre en Noir\r\nPare-soleil c&ocirc;t&eacute;s conducteur et passager AV\r\nAudi Smartphone Interface (Apple CarPlay / Google Android Auto)\r\nTapis compl&eacute;mentaires AV/AR\r\nVide-poches dans les contre-portes AV/AR\r\nCarte main libre\r\nClimatisation automatique\r\nDirection assist&eacute;e\r\nPrise audio USB\r\nR&eacute;gulateur de vitesse\r\nR&eacute;gulateur limiteur de vitesse\r\nR&eacute;troviseur int. jour/nuit auto\r\nSi&egrave;ges chauffants\r\nSi&egrave;ges sport\r\nVitres surteint&eacute;es', 'Cam&eacute;ra de recul\r\nSyst&egrave;me de lecture des panneaux de signalisation par cam&eacute;ra\r\nAirbags grand volume pour conducteur et passager AV\r\nRecommandation de repos\r\nAudi Pre-Sense City\r\nColonne de direction de s&eacute;curit&eacute;\r\nS&eacute;curit&eacute; enfants manuelle\r\nAide au d&eacute;marrage en c&ocirc;te\r\nAirbags frontaux\r\nAirbags lat&eacute;raux\r\nAnti patinage\r\nASR\r\nD&eacute;tecteur de pluie\r\nESP\r\nFixations ISOFIX', '10 HP dont 1 central dans le tableau de bord et 1 subwoofer\r\n2 kW AC (en courant monophas&eacute;)\r\n5 places\r\n6 m\r\n8 A\r\n8Jx19\'\'\r\naccoudoir central\r\nAffichage de perte de pression des pneus\r\nApplications d&eacute;coratives en Bois de ch&ecirc;ne Gris Nature\r\nApplications d&eacute;coratives Piano laqu&eacute; Noir Audi Exclusive\r\nAppui lombaire &agrave; 4 axes pour les si&egrave;ges AV: r&eacute;glage &eacute;lectrique\r\nAudi drive select\r\nAudi Parking System Plus: Syst&egrave;me accoustique et visuel d\'aide au stationnement AV et AR\r\nAudi pre sense rear\r\nAudi Sound System : amplificateurs 6 canaux\r\nAugmentation de la capacit&eacute; du r&eacute;servoir &agrave; carburant &agrave; 70 litres\r\navec fonction m&eacute;moire et buses de lave-glaces d&eacute;givrantes pour le pare-brise\r\nBang &amp; Olufsen Premium Sound System avec son en 3D\r\nBo&icirc;tiers de r&eacute;troviseurs ext&eacute;rieurs en Noir brillant\r\nC&acirc;ble de charge pour chargeur \'\'e-tron compact\'\'\r\nC&acirc;ble de charge pour station publique en courant alternatif pour charge en Mode 3 / Type 2 7\r\nC&acirc;bles de recharge pour t&eacute;l&eacute;phone portable\r\nCalandre en noir titane laqu&eacute; avec lamelles verticales en aluminium argent mat et entourage en chrome\r\nCam&eacute;ra multifonction\r\nCeintures de s&eacute;curit&eacute; automatiques &agrave; 3 points pour tous les si&egrave;ges\r\nCiel de pavillon en Tissu Noir\r\nclignotants LED\r\nCockpit num&eacute;rique\r\ncol de cygne et boule en acier forg&eacute;.\r\ncontr&ocirc;le de port de ceinture AV\r\nCrochet d\'attelage escamotable m&eacute;caniquement\r\nd&eacute;givrants des 2 c&ocirc;t&eacute;s\r\nDiffuseur AR en Noir Titane mat\r\nEtriers de freins laqu&eacute;s Rouges\r\nfreinage &agrave; r&eacute;cup&eacute;ration d\'&eacute;nergie\r\nGrilles d\'entr&eacute;e d\'air lat&eacute;rales en noir mat grain&eacute; avec insert en argent aluminium mat\r\nGris Graphite\r\nJantes en aluminium coul&eacute; en style 5 branches en V\r\nPack Eclairage d\'ambiance\r\nPack Esth&eacute;tique Noir Titane\r\nPack Ext&eacute;rieur Brillance\r\npneus 235/55 R19\r\nProjecteurs HD Matrix LED avec feux AR &agrave; technologie OLED\r\nradio num&eacute;rique\r\nRampes de pavillon Noires\r\nR&eacute;servoir &agrave; carburant sp&eacute;cifique &agrave; la motorisation TFSI e (54 litres)\r\nSi&egrave;ges AV &agrave; r&eacute;glages &eacute;lectriques + fonction m&eacute;moires c&ocirc;t&eacute; conducteur\r\nSpoiler de toit AR sport\r\nSuppression des rampes de pavillon\r\nSyst&egrave;me de recharge e-tron compact\r\nSyst&egrave;me Start/Stop\r\ntourn&eacute;es brillantes\r\ntype domestique\r\nVolant 3 branches multifonctions plus en cuir', '66166440b4ce96.24568732'),
(58, 'Toit ouvrant panoramique', '', '', 'Cam&eacute;ra de recul avec vision 360&deg; (4 cam&eacute;ras)', '661664a014baf6.79728558'),
(59, 'Ch&acirc;ssis sport', 'Cam&eacute;ra de recul\r\nClimatisation automatique\r\nClimatisation automatique multi zone\r\nR&eacute;gulateur de vitesse\r\nSi&egrave;ges chauffants\r\nTapis de sol\r\nVolant sport', 'D&eacute;tecteur de pluie', '2 places\r\nCarnet d\'entretien\r\nEcusson Porsche sur appuis-t&ecirc;te\r\nEntourage des vitres lat&eacute;rales &agrave; finition brillante\r\nJantes Carrera Classic 20 pouces\r\nModule Connect Plus\r\nPorsche Communication management incluant module de navigation\r\nPorsche Dynamic Light System (PDLS)\r\nPorsche Torque Vectoring (PTV) avec diff&eacute;rentiel arri&egrave;re &agrave; glissement limit&eacute; m&eacute;canique\r\nServotronic Plus\r\nSi&egrave;ges sport Plus Int&eacute;rieur tout cuir\r\nSyst&egrave;me d\'&eacute;chappement Sport en Argent', '66166518281170.14929546'),
(60, 'Phares &agrave; allumage automatique\r\nAmpoules de phares LED\r\nFreins r&eacute;g&eacute;n&eacute;rateurs\r\nFeux arri&egrave;res &agrave; LED\r\nR&eacute;troviseurs ext&eacute;rieurs r&eacute;glage &eacute;lectrique\r\nFeux de route &agrave; LED\r\nR&eacute;troviseurs ext&eacute;rieurs chauffants\r\nFeux de croisement automatiques', 'Syst&egrave;me audio carte digitale, CD\r\nBouton d&eacute;marrage\r\nPalettes au volant\r\nFermerture &eacute;lectrique du coffre\r\nAir conditionn&eacute; auto\r\nSyst&egrave;me de navigation\r\nSyst&egrave;me audio lecteur CD et MP3\r\nBluetooth inclut musique en streaming, connexion t&eacute;l&eacute;phone\r\nDVD/VCD\r\nR&eacute;gulateur de vitesse\r\nSmart card / Smart key\r\nVolant cuir\r\nSyst&egrave;me audio inclut DVD\r\nOrdinateur de bord\r\nSi&egrave;ge avant &eacute;lectrique\r\nTapis de sol\r\nOuverture du coffre &agrave; distance\r\nTaille &eacute;cran navigation 8 pouces\r\nAccoudoir central arri&egrave;re, avant\r\nSyst&egrave;me de navigation info trafic\r\nR&eacute;troviseur jour/nuit\r\nVolant multi-fonction\r\nR&eacute;seau Wifi\r\nBluetooth\r\nReconnaissance vocale\r\n14 haut-parleurs\r\nAir conditionn&eacute; 4 zones\r\nSi&egrave;ge avant chauffant\r\nR&eacute;glage du volant en hauteur, &eacute;lectrique, en profondeur\r\nTaille &eacute;cran multi-fonctions 7 pouces\r\nClimatisation automatique multi zone\r\nPack carbone', '6 airbags\r\nESP\r\nAirbags rideaux\r\nSyst&egrave;me d&eacute;tection de collision\r\nLave-phares\r\nIndicateur de sous-gonflage des pneus\r\nAssistance au freinage d\'urgence\r\nKit anticrevaison\r\nEssuie glace capteur de pluie\r\nAntipatinage\r\nABS\r\nAirbags lat&eacute;raux\r\nAide au d&eacute;marrage en c&ocirc;te', 'Audi Park Assist\r\nAudi smartphone interface\r\nBang &amp; Olufsen Advanced Sound System\r\nCarnet d\'entretien\r\nDiff&eacute;rentiel quattro sport\r\nFixations ISOFIX\r\nFreins c&eacute;ramique\r\nIndicateur de limitation de vitesse\r\nJantes Audi Sport en aluminium coul&eacute; 5 branches doubles brillantes 9,5J x 21&rdquo; avec pneus 285/30 R21\r\nPack aluminium mat incluant inscription &quot;quattro&quot; sur le bas de la calandre\r\nPack dynamique plus\r\nPeinture Audi Exclusive\r\nPhares Audi Matrix LED\r\nR&eacute;ception analogique/num&eacute;rique + radio num&eacute;rique DAB\r\nSellerie cuir Valcona avec surpiq&ucirc;res contrast&eacute;es en nid-d\'abeilles et emboss&eacute;e RS6\r\nSuppression du toit ouvrant\r\nSyst&egrave;me d\'&eacute;chappement Sport\r\nVision p&eacute;riph&eacute;rique 360&deg;\r\nVolant sport multifonctions cuir/tiptron', '6616658e908672.89143577'),
(61, 'Stripping lat&eacute;ral orange\r\nAllumage automatique des feux et essuie-glace manuels\r\nRoue de secours\r\nJantes alu\r\nRadar de recul\r\nR&eacute;troviseurs &eacute;lectriques et d&eacute;givrants\r\nR&eacute;troviseurs rabattables', 'L&egrave;ve-vitres AR &eacute;lectriques\r\nDirection assist&eacute;e\r\nCondamnation centralis&eacute;e des portes &agrave; distance\r\nEssuie-lunette AR\r\nOrdinateur de bord\r\nCondamnation des portes en roulant\r\nBouton appel d\'urgence\r\nBanquette AR 1/1\r\nHarmonie noir\r\nInserts d&eacute;coratifs Orange int&eacute;rieur/ext&eacute;rieur\r\nSellerie TEP noire avec surpiq&ucirc;res orange\r\nR&eacute;troviseurs ext&eacute;rieurs orange\r\n4 vitres &eacute;lectriques\r\nAllume cigare\r\nBanquette rabattable\r\nCam&eacute;ra de recul\r\nClimatisation\r\nR&eacute;gulateur de vitesse', 'Assistance au freinage d\'urgence (AFU)\r\nFeux et essuie-glaces automatiques\r\nFixations ISOFIX', 'C&acirc;ble domestique Mode 2 (10A)\r\nCarnet d\'entretien\r\nExtension de garantie constructeur 1 an\r\nFactures d\'entretien\r\nNon fumeur', '6616662c054e63.98090079'),
(62, '4 roues motrices\r\nAttelage\r\nJantes alu\r\nPeinture m&eacute;tallis&eacute;e\r\nProjecteurs x&eacute;non\r\nRadar de recul\r\nToit panoramique', 'Cam&eacute;ra de recul\r\nClimatisation\r\nDirection assist&eacute;e\r\nFermeture &eacute;lectrique\r\nGPS\r\nOrdinateur de bord\r\nR&eacute;gulateur de vitesse\r\nSi&egrave;ges chauffants\r\nVitres &eacute;lectriques\r\nVolant multifonctions', 'ABS\r\nAirbags lat&eacute;raux\r\nAnti patinage\r\nD&eacute;tecteur de pluie\r\nFeux automatiques', 'Airbag avant\r\nPhares au LED\r\nStart/Stop automatique\r\ntoit ouvrant', '661666a2b04c85.46566421'),
(63, 'Capot actif\r\nCalandre &agrave; damier chrom&eacute; et contour chrom&eacute;\r\nSeuils de portes AV en Inox\r\nPlanche de bord surpiqu&eacute;e\r\nBoitiers de r&eacute;troviseurs ext&eacute;rieurs noirs brillant\r\nPourtour de vitres lat&eacute;rales noir brillant\r\nDriver Sport Pack\r\nJantes alliage 18&quot; Sperone bi-ton diamant&eacute;es\r\nFrein de stationnement &eacute;lectrique avec aide au d&eacute;marrage en pente\r\nActive Suspension Control\r\nP&eacute;dalier et repose-pied conducteur en aluminium\r\nAide parking av/ar\r\nAide parking avec cam&eacute;ra de recul\r\nFrein de parking automatique\r\nHayon &eacute;lectrique\r\nJantes alu 18&quot;\r\nLunette arri&egrave;re d&eacute;givrante\r\nPeinture m&eacute;tallis&eacute;e\r\nR&eacute;troviseurs &eacute;lectriques et d&eacute;givrants\r\nR&eacute;troviseurs rabattables &eacute;lectriquement\r\nR&eacute;gulateur adaptatif', 'Avertisseurs sonore exterieur\r\nConsole centrale AV avec 2 porte-gobelets r&eacute;tro&eacute;clair&eacute;s\r\nTrappe de recharge &eacute;lectrique (aile AR gauche) avec &eacute;clairage d\'accueil et t&eacute;moins lumineux de charge programmable\r\nAcc&egrave;s et d&eacute;marrage mains libres\r\nCommande de verrouillage &agrave; distance\r\nSi&egrave;ges AV m&eacute;caniques &agrave; r&eacute;glage lombaire &eacute;lectrique\r\nAir Quality System\r\nContr&ocirc;le de la charge de la batterie &agrave; distance\r\nD&eacute;marrage mains libres\r\nEclairage int&eacute;rieur &agrave; LED &eacute;tendu Eclairage int&eacute;rieur LED + zone coffre (x2), pare-soleil, accoudoir central, porte-gobelets, caves &agrave; pieds\r\nDirection assist&eacute;e &eacute;lectrique, colonne de direction r&eacute;glable en hauteur et profondeur (m&eacute;canique)\r\nSurtapis AV et AR noirs avec double surpiq&ucirc;re aikinite\r\nVolant cuir fleur perfor&eacute; avec bagues chrom&eacute;es et badge GT\r\nChauffage programmable &eacute;lectrique avec r&eacute;glage &agrave; distance ou gr&acirc;ce &agrave; l\'&eacute;cran tactile 10\'\' HD\r\nR&eacute;troviseur int&eacute;rieur photosensible frameless (sans cadre) avec t&eacute;moin lumineux d\'information roulage mode ELECTRIC\r\nPr&eacute;-chauffage / climatisation du v&eacute;hicule &agrave; distance\r\nFonction &quot;Mirror Screen&quot;\r\nHayon mains libres\r\nD&eacute;cors de planche de bord et panneaux de portes en bois fa&ccedil;on essence de Zebrano\r\nModule 2 prises USB de charge pour les passagers AR\r\nSi&egrave;ges AV m&eacute;caniques &agrave; r&eacute;glage manuel en hauteur\r\nTrappe &agrave; carburant (aile AR droite) avec ouverture depuis l\'habitacle\r\nBanquette rabattable 1/3 - 2/3 avec accoudoir et trappe &agrave; skis\r\nEcran tactile capacitif 10&quot; et 2 prises USB AV\r\nSyst&egrave;me HI-FI Premium FOCAL - La signature acoustique fran&ccedil;aise Woofers / m&eacute;diums haute-fid&eacute;lit&eacute; : Technologie Polyglass, Tweeters TNF : Technologie de d&ocirc;mes invers&eacute;s en aluminium, Subwoofer : Technologie triple bobine Power Flower 200 mm, Amplification active 12 voies 515 Watts : Technologie hybride Classe AB / Classe D\r\nFilets aum&ocirc;ni&egrave;res au dos des si&egrave;ges AV\r\nPeugeot Full LED Technology\r\nEssuie-vitre AV avec syst&egrave;me de lavage &quot;Magic Walsh&quot;\r\nVerrouillage automatique de tous les ouvrants en roulant\r\nEclairage d\'ambiance bleu sur planche de bord, panneaux de porte et console centrale\r\nFonction DAB (Radio Num&eacute;rique Terrestre)\r\nToggle Switches\' chrom&eacute;s (touches \'piano\' d\'activation des fonctions de l\'&eacute;cran tactile)\r\nPack Si&egrave;ges semi-&eacute;lectrique AGR\r\nBo&icirc;te &agrave; gants floqu&eacute;e et &eacute;clair&eacute;e\r\n2 prise USB sur console AR\r\nVitres lat&eacute;rales AR et lunette AR surteint&eacute;es\r\nR&eacute;troviseur int&eacute;rieur photosensible\r\nR&eacute;troviseurs ext&eacute;rieurs photosensibles &eacute;lectriques, d&eacute;givrants et rabattables &eacute;lectriquement avec &eacute;clairage d\'accueil &agrave; LED\r\nAir conditionn&eacute; automatique bi-zone\r\nCeintures de s&eacute;curit&eacute; AR avec limiteurs d\'effort progressifs\r\nSi&egrave;ges AV chauffants\r\nCrochets pour cintres aux places AR\r\nPeugeot i-Cockpit avec combin&eacute; t&ecirc;te haute num&eacute;rique reconfigurable, &eacute;cran tactile capacitif 10&quot; et volant compact multi-fonctions\r\nGarnissage TEP Mistral &amp; Alcantara Greval\r\nAVAS (syst&egrave;me d\'alerte sonore du v&eacute;hicule &eacute;mis &agrave; faible allure en roulage &eacute;lectrique, audible depuis l\'ext&eacute;rieur pour la s&eacute;curit&eacute; des pi&eacute;tons)\r\nBacs de portes AV floqu&eacute;s\r\nHabitacle et ciel de pavillon noir\r\nL&egrave;ve-vitres AV et AR &eacute;lectriques s&eacute;quentiels avec antipincement\r\nChargeur embarqu&eacute; 3,7kW : c&acirc;ble de recharge T2 avec prise murale\r\nAccoudoir central AV &agrave; ouverture papillon, avec compartiment de rangement &eacute;clair&eacute;\r\nBadge &quot;Hybrid&quot;, sur custode AR et volet de coffre\r\n4 vitres &eacute;lectriques\r\nAccoudoir central avant\r\nAppuis-t&ecirc;tes arri&egrave;re\r\nBanquette fractionnable\r\nBanquette rabattable\r\nBoite automatique\r\nBoite s&eacute;quentielle\r\nClimatisation automatique multi zone\r\nD&eacute;marrage sans clef\r\nDirection assist&eacute;e\r\n&Eacute;clairage int&eacute;rieur temporis&eacute;\r\nFermeture &eacute;lectrique automatique\r\nGPS 16/9\r\nOrdinateur de bord\r\nOuverture du coffre &eacute;lectrique\r\nPack &eacute;lectrique\r\nPrise 12V\r\nPrise audio USB\r\nR&eacute;troviseur int. jour/nuit auto\r\nSi&egrave;ges chauffants\r\nSi&egrave;ges &eacute;lectriques\r\nSi&egrave;ges massants\r\nSi&egrave;ges r&eacute;glables en hauteur\r\nSupport lombaires &eacute;lectrique\r\nSyst&egrave;me audio MP3\r\nTapis de sol\r\nVitres ar. surteint&eacute;es\r\nVitres teint&eacute;es\r\nVolant et pommeau cuir\r\nVolant multifonctions\r\nVolant r&eacute;glable en hauteur et profondeur\r\nVolant sport\r\n&Eacute;cran tactile\r\nAPPLE CAR PLAY', 'Ceintures de s&eacute;curit&eacute; AV &agrave; enrouleurs &agrave; pr&eacute;tension pyrotechnique et limiteur d\'efforts\r\nPack Visibilit&eacute;\r\nPack Safety Plus\r\nPack Drive Assist Plus\r\nAide graphique et sonore au stationnement AR, AV et en lat&eacute;ral Full Park Assist, VisioPark2\r\n3e feu stop\r\nAirbags front. + lat.\r\nAirbags rideaux\r\nAlerte franchissement ligne\r\nProjecteurs antibrouillard\r\nAvertisseur d\'angle mort\r\nConnexion SOS\r\nD&eacute;tecteur de pluie\r\nEssuie-glaces automatiques\r\nFeux ar. &agrave; LED\r\nFeux automatiques\r\nFixations ISOFIX\r\nKit t&eacute;l&eacute;phone main libre bluetooth\r\nPhares av. de jour &agrave; LED\r\nSuspension pilot&eacute;e\r\nSyst&egrave;me de d&eacute;tection de somnolence\r\nSyst&egrave;me de vision de nuit', 'Syst&egrave;me d\'entr&eacute;e sans clef\r\nVirtual cockpit', '6616672d9c78d2.40510850');

-- --------------------------------------------------------

--
-- Structure de la table `users_parrot`
--

DROP TABLE IF EXISTS `users_parrot`;
CREATE TABLE IF NOT EXISTS `users_parrot` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users_parrot`
--

INSERT INTO `users_parrot` (`id_user`, `name`, `firstname`, `mail`, `password`, `role`) VALUES
(1, 'admin', 'test', 'admin@test.gmail', '$2y$10$BgzdT/XMYZ5mLLGWMFEOY.jnLamhRz1Gu99ivHKNufRkY5cpoto5u', 'admin'),
(3, 'beta', 'test', 'beta@test.gmail', '$2y$10$wyCVMH.JxjulgkqFfN.7vOzdzm8PZ8tSa.4zm8LNlVyx/Keobjd8W', 'beta'),
(5, 'julien', 'Dupont', 'dupont@gmail.com', '$2y$10$8xey4fK6rjgPOVR/33WM1eYV1aD3VBTC6dXbxqAin2eJaY6EFoX2K', 'beta');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id_car` varchar(100) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `annee` varchar(10) NOT NULL,
  `km` varchar(10) NOT NULL,
  `energie` varchar(20) NOT NULL,
  `transmission` varchar(20) NOT NULL,
  `cv` varchar(10) DEFAULT NULL,
  `prix` varchar(20) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id_car`, `marque`, `modele`, `annee`, `km`, `energie`, `transmission`, `cv`, `prix`, `img`) VALUES
('6616606609eba2.36515779', 'Porsche 911', 'Type 992', '2022', '6718', 'Essence', 'Boite automatique', '61', '269890', '../upload_img/661660660a910.porsche 911 3.jpg'),
('661661f4d20560.57646165', 'Jeep', 'Compass', '2022', '22999', 'Hybride', 'Boite automatique', '10', '36470', '../upload_img/661661f4d2907.jeep compass1.jpg'),
('6616628212ad23.12905207', 'BMW', 'Serie 4', '2021', '9521', 'Essence', 'Boite automatique', '10', '45990', '../upload_img/66166282135d9.bmw serie4 3.jpg'),
('66166303184722.29247980', 'Mercedes', 'GLC', '2017', '160200', 'Essence', 'Boite automatique', '5', '34990', '../upload_img/6616630318e88.glc2.jpg'),
('661663c97a9666.10647014', 'Tesla', 'Model X', '2019', '55900', 'Electrique', 'Boite automatique', '10', '68900', '../upload_img/661663c97b399.tesla3.jpg'),
('66166440b4ce96.24568732', 'Audi', 'Q5', '2022', '70826', 'Hybride', 'Boite automatique', '16', '64990', '../upload_img/66166440b573a.audi q5 1.jpg'),
('661664a014baf6.79728558', 'Skoda', 'Octavia', '2023', '16100', 'Essence', 'Boite automatique', '14', '43490', '../upload_img/661664a0154dc.octavia1.jpg'),
('66166518281170.14929546', 'Porsche ', '718 cayman', '2017', '72000', 'Essence', 'Boite automatique', '23', '64900', '../upload_img/6616651828a02.porsche 718 2.jpg'),
('6616658e908672.89143577', 'Audi', 'RS6', '2015', '54900', 'Essence', 'Boite automatique', '47', '69890', '../upload_img/6616658e91370.audi rs6 2.jpg'),
('6616662c054e63.98090079', 'Dacia', 'Spring', '2021', '5140', 'Electrique', 'Boite automatique', '2', '13990', '../upload_img/6616662c06010.dacia spring4.jpg'),
('661666a2b04c85.46566421', 'Ford ', 'F150', '2017', '25000', 'Essence', 'Boite automatique', '29', '115000', '../upload_img/661666a2b0dc6.ford f150 1.jpg'),
('6616672d9c78d2.40510850', 'Peugeot', '508', '2021', '14098', 'Hybride', 'Boite automatique', '10', '29900', '../upload_img/6616672d9d140.peugeot 508 1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
