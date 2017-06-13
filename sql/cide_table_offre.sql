
-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id` int(11) NOT NULL,
  `idUtil` int(11) NOT NULL,
  `nom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `metier` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `etranger` int(11) NOT NULL,
  `nature` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `duree` int(11) NOT NULL,
  `mobilite` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `filiere` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`id`, `idUtil`, `nom`, `metier`, `lieu`, `etranger`, `nature`, `duree`, `mobilite`, `description`, `filiere`, `visible`) VALUES
(9, 114, 'zrg', 'grgrgrg', 'grgrg', 1, 'cdi', 5, 0, 'sgrgezzegrg', 'mécanique', 1);
