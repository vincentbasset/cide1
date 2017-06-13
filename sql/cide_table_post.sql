
-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `idUtil` int(11) NOT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  `idUtilmur` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `visibilite` tinyint(1) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fichier` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `idUtil`, `idGroupe`, `idUtilmur`, `idPost`, `visibilite`, `importance`, `message`, `url`, `datepost`, `fichier`) VALUES
(99, 1, 19, 0, 0, 0, 0, 'Bienvenue', '', '2017-06-13 14:31:38', NULL),
(98, 1, 19, 0, 0, 1, 0, 'Voici le groupe des 3A Textile', '', '2017-06-13 14:31:30', NULL),
(97, 1, 18, 0, 0, 0, 0, 'Bienvenue!', '', '2017-06-13 14:31:10', NULL),
(96, 1, 18, 0, 0, 1, 0, 'Voici le groupe des 2A Textile', '', '2017-06-13 14:30:51', NULL),
(95, 1, 17, 0, 0, 0, 0, 'Bienvenue!', '', '2017-06-13 14:30:17', NULL),
(94, 1, 17, 0, 0, 1, 0, 'Voici le groupe des 1A textile', '', '2017-06-13 14:29:59', NULL),
(93, 114, 8, 0, 0, 0, 0, 'Les notes du projet AOO sont disponibles!', '', '2017-06-13 15:37:53', NULL),
(92, 116, 0, 0, 90, 0, 0, 'Pendant les vacances viens me faire un coucou dans le ch\'nord il drache beaucoup là bas mais c\'est pas grave!\r\nTu me diras quoi', '', '2017-06-13 15:16:17', NULL),
(91, 118, 0, 0, 86, 0, 0, 'C\'est moi qui l\'ait fait!!!!', '', '2017-06-13 15:08:48', NULL),
(90, 118, 0, 116, 0, 0, 0, 'A quand la bière ch\'ti?J\'ai soif!', '', '2017-06-13 15:03:35', NULL),
(89, 119, 8, 0, 0, 0, 1, 'Le conseil des 1A arrive! \r\nSi vous avez des messages à faire passer, venez mp', '', '2017-06-13 14:57:36', NULL),
(88, 119, 0, 0, 87, 0, 0, 'Ok mais la prochaine chanson c\'est du métal s\'il vous plait!', '', '2017-06-13 14:54:08', NULL),
(87, 115, 0, 115, 0, 0, 0, 'A quand la prochaine chorégraphie?', 'https://www.youtube.com/watch?v=gyv89c-fqsU', '2017-06-13 14:49:26', NULL),
(86, 1, 1, 0, 0, 1, 1, 'Bienvenue sur notre propre réseau social!', '', '2017-06-13 14:44:07', NULL);
