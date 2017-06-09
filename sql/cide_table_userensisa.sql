
-- --------------------------------------------------------

--
-- Structure de la table `userensisa`
--

CREATE TABLE `userensisa` (
  `id` int(11) NOT NULL,
  `mail` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `filiere` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annee` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `userensisa`
--

INSERT INTO `userensisa` (`id`, `mail`, `statut`, `filiere`, `annee`) VALUES
(1, 'louis.planes@uha.fr', 'etudiant', 'Informatique', '1A'),
(2, 'fanny.ringler@uha.fr', 'etudiant', 'Informatique', '1A'),
(3, 'florian.jaby@uha.fr', 'etudiant', 'Informatique', '1A'),
(4, 'vincent.basset@uha.fr', 'etudiant', 'Informatique', '1A'),
(5, 'p.a@uha.fr', 'Administration', NULL, NULL);
