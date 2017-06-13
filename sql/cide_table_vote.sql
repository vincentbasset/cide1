
-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `idUtil` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`idUtil`, `idPost`, `type`) VALUES
(115, 69, 'like'),
(115, 67, 'like'),
(115, 64, 'dislike'),
(115, 65, 'like'),
(115, 50, 'like'),
(115, 14, 'like'),
(115, 26, 'like'),
(115, 63, 'like'),
(115, 46, 'like'),
(115, 17, 'like'),
(115, 51, 'like'),
(115, 48, 'like'),
(115, 58, 'like'),
(115, 70, 'dislike'),
(115, 66, 'like'),
(1, 69, 'like'),
(116, 71, 'like'),
(116, 2, 'dislike');
