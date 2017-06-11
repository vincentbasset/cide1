
--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`idUtil`,`idGroupe`);

--
-- Index pour la table `chatdans`
--
ALTER TABLE `chatdans`
  ADD PRIMARY KEY (`idutil`,`idroom`),
  ADD KEY `idroom` (`idroom`);

--
-- Index pour la table `chatmsg`
--
ALTER TABLE `chatmsg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idroom` (`idroom`);

--
-- Index pour la table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adresse` (`adresse`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chatmsg`
--
ALTER TABLE `chatmsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chatdans`
--
ALTER TABLE `chatdans`
  ADD CONSTRAINT `room` FOREIGN KEY (`idroom`) REFERENCES `chatroom` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `chatmsg`
--
ALTER TABLE `chatmsg`
  ADD CONSTRAINT `room_msg` FOREIGN KEY (`idroom`) REFERENCES `chatroom` (`id`) ON DELETE CASCADE;
