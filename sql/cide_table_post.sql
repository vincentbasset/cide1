
-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `visibilite` tinyint(1) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `visibilite`, `importance`, `message`, `datepost`) VALUES
(1, 1, 1, 'message public et important', '2017-05-30 12:32:19'),
(2, 0, 0, 'message non privée et non important', '2017-05-30 12:32:19'),
(3, 0, 1, 'message privée mais important', '2017-05-30 12:33:04'),
(4, 1, 0, 'message public mais non important', '2017-05-30 12:33:04'),
(5, 1, 1, 'partielle 1A info incomming', '2017-05-30 12:45:46'),
(6, 1, 0, 'message public non important de la part de votre délégué', '2017-05-30 12:45:46'),
(7, 1, 0, 'bonjour les copains', '2017-05-31 13:23:54');
