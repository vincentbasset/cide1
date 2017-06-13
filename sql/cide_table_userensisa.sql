
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
(5, 'p.a@uha.fr', 'Administration', NULL, NULL),
(6, 'Jacques.vernay@uha.fr', 'etudiant', 'Informatique', '1A'),
(7, 'OMAR.AMGHAR@uhb.fr', 'etudiant', 'Informatique', '1A'),
(8, 'hugo.asensio@uhb.fr', 'etudiant', 'Informatique', '1A'),
(9, 'SIRINE.BEN-ABDESSLAM@uhb.fr', 'etudiant', 'Informatique', '1A'),
(10, 'saad.bendaoud@uhb.fr', 'etudiant', 'Informatique', '1A'),
(11, 'thomas.blangero@uhb.fr', 'etudiant', 'Informatique', '1A'),
(12, 'henry.dando@uhb.fr', 'etudiant', 'Informatique', '1A'),
(13, 'benjamin.devie@uhb.fr', 'etudiant', 'Informatique', '1A'),
(14, 'houda.elmouden@uhb.fr', 'etudiant', 'Informatique', '1A'),
(15, 'bryan.follin@uhb.fr', 'etudiant', 'Informatique', '1A'),
(16, 'kylian.gehier@uhb.fr', 'etudiant', 'Informatique', '1A'),
(17, 'bastien.geldreich@uhb.fr', 'etudiant', 'Informatique', '1A'),
(18, 'axel.huynh-phuc@uhb.fr', 'etudiant', 'Informatique', '1A'),
(19, 'bryan.letohic@uhb.fr', 'etudiant', 'Informatique', '1A'),
(20, 'theo.liberman@uhb.fr', 'etudiant', 'Informatique', '1A'),
(21, 'gabin.michalet@uhb.fr', 'etudiant', 'Informatique', '1A'),
(22, 'kevin.ouahmad@uhb.fr', 'etudiant', 'Informatique', '1A'),
(23, 'youssouph.sagna@uhb.fr', 'etudiant', 'Informatique', '1A'),
(24, 'olivier.tinh@uhb.fr', 'etudiant', 'Informatique', '1A'),
(25, 'corentin.verdalle@uhb.fr', 'etudiant', 'Informatique', '1A'),
(26, 'david.vergnault@uhb.fr', 'etudiant', 'Informatique', '1A'),
(27, 'oussama.bendahi@uhb.fr', 'etudiant', 'Informatique', '1A'),
(28, 'saad.bennani@uhb.fr', 'etudiant', 'Informatique', '1A'),
(29, 'nolwenn.bernard@uhb.fr', 'etudiant', 'Informatique', '1A'),
(30, 'andy.chabalier@uhb.fr', 'etudiant', 'Informatique', '1A'),
(31, 'hassen.dormok@uhb.fr', 'etudiant', 'Informatique', '1A'),
(32, 'lucas.gauziede@uhb.fr', 'etudiant', 'Informatique', '1A'),
(33, 'fadel.hallal@uhb.fr', 'etudiant', 'Informatique', '1A'),
(34, 'phillipe.letaif@uhb.fr', 'etudiant', 'Informatique', '1A'),
(35, 'hamza.marah@uhb.fr', 'etudiant', 'Informatique', '1A'),
(36, 'liuyan.pan@uhb.fr', 'etudiant', 'Informatique', '1A'),
(37, 'baptiste.refalo@uhb.fr', 'etudiant', 'Informatique', '1A'),
(38, 'antoine.benard@uhb.fr', 'etudiant', 'Informatique', '1A'),
(39, 'alexandre.colicchio@uhb.fr', 'etudiant', 'Informatique', '1A'),
(40, 'thibaud.gasser@uhb.fr', 'etudiant', 'Informatique', '1A'),
(41, 'nicolas.greiner@uhb.fr', 'etudiant', 'Informatique', '1A'),
(42, 'rachel.noireau@uhb.fr', 'etudiant', 'Informatique', '1A'),
(43, 'francois.straebler@uhb.fr', 'etudiant', 'Informatique', '1A'),
(44, 'pierre.wechsler@uhb.fr', 'etudiant', 'Informatique', '1A');
