
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
(114, 86, 'like'),
(114, 87, 'like'),
(118, 86, 'like'),
(118, 87, 'dislike');
