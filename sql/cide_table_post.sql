
-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `idUtil` int(11) NOT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  `idUtilmur` int(11) NOT NULL,
  `visibilite` tinyint(1) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `idUtil`, `idGroupe`, `idUtilmur`, `visibilite`, `importance`, `message`, `datepost`) VALUES
(1, 1, 1, 0, 1, 1, 'message public et important', '2017-05-30 12:32:19'),
(2, 1, 1, 0, 0, 0, 'message privée et non important', '2017-05-30 12:32:19'),
(3, 1, 1, 0, 0, 1, 'message privée mais important', '2017-05-30 12:33:04'),
(4, 1, 1, 0, 1, 0, 'message public mais non important', '2017-05-30 12:33:04'),
(5, 3, NULL, 0, 1, 1, 'partielle 1A info incomming', '2017-05-30 12:45:46'),
(6, 3, NULL, 0, 1, 0, 'message public non important de la part de votre délégué', '2017-05-30 12:45:46'),
(7, 5, NULL, 0, 1, 0, 'bonjour les copains', '2017-05-31 13:23:54'),
(8, 5, 1, 0, 0, 0, 'bonjour\r\n', '2017-06-02 07:26:21'),
(9, 5, 1, 0, 0, 0, 'salut\r\n', '2017-06-02 07:28:05'),
(10, 5, 1, 0, 0, 0, 'vincent je t\'aime', '2017-06-02 07:29:12');
