SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `somme`(a int,b int) RETURNS int(11)
begin 
declare s int;
set s=a+b;

return s;

end$$

DELIMITER ;

CREATE TABLE IF NOT EXISTS `achat` (
  `numcommande` int(11) NOT NULL DEFAULT '0',
  `iditem` int(11) NOT NULL DEFAULT '0',
  `qte` int(11) DEFAULT NULL,
  PRIMARY KEY (`numcommande`,`iditem`),
  KEY `iditem` (`iditem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `cartebancaire` (
  `num_carte` varchar(22) NOT NULL DEFAULT '',
  `detenteur` varchar(22) DEFAULT NULL,
  `anneeexp` varchar(22) DEFAULT NULL,
  `moisexp` varchar(22) DEFAULT NULL,
  `crypto` varchar(22) DEFAULT NULL,
  PRIMARY KEY (`num_carte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cartebancaire` (`num_carte`, `detenteur`, `anneeexp`, `moisexp`, `crypto`) VALUES
('123456789', 'TDM', '2022', '12', '123');

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Menus'),
(2, 'Burgers'),
(3, 'Snacks'),
(4, 'Salades'),
(5, 'Boissons'),
(6, 'Desserts');

CREATE TABLE IF NOT EXISTS `client` (
  `email` varchar(22) NOT NULL DEFAULT '',
  `nom` varchar(22) DEFAULT NULL,
  `prenom` varchar(22) DEFAULT NULL,
  `tel` varchar(22) DEFAULT NULL,
  `datenaissance` date NOT NULL,
  `password` varchar(22) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `client` (`email`, `nom`, `prenom`, `tel`, `datenaissance`, `password`) VALUES
('dibgfx@gmail.com', 'azeggouar', 'karim', '0678817881', '2019-12-31', '123'),
('k.azeggouar@gmail.com', 'azeggouar', 'karim', '0678817881', '2019-12-25', '123'),
('k.azeggouar@yahoo.fr', 'azeggouar', 'karim', '0678817881', '2019-12-25', '123');

CREATE TABLE IF NOT EXISTS `commande` (
  `num` int(11) NOT NULL,
  `email` varchar(22) DEFAULT NULL,
  `datecommande` date DEFAULT NULL,
  PRIMARY KEY (`num`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'Menu Classic', 'Sandwich: Burger, Salade, Tomate, Cornichon + Frites + Boisson', 8.9, 'm1.png', 1),
(2, 'Menu Bacon', 'Sandwich: Burger, Fromage, Bacon, Salade, Tomate + Frites + Boisson', 9.5, 'm2.png', 1),
(3, 'Menu Big', 'Sandwich: Double Burger, Fromage, Cornichon, Salade + Frites + Boisson', 10.9, 'm3.png', 1),
(4, 'Menu Chicken', 'Sandwich: Poulet Frit, Tomate, Salade, Mayonnaise + Frites + Boisson', 9.9, 'm4.png', 1),
(5, 'Menu Fish', 'Sandwich: Poisson, Salade, Mayonnaise, Cornichon + Frites + Boisson', 10.9, 'm5.png', 1),
(6, 'Menu Double Steak', 'Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate + Frites + Boisson', 11.9, 'm6.png', 1),
(7, 'Classic', 'Sandwich: Burger, Salade, Tomate, Cornichon', 5.9, 'b1.png', 2),
(8, 'Bacon', 'Sandwich: Burger, Fromage, Bacon, Salade, Tomate', 6.5, 'b2.png', 2),
(9, 'Big', 'Sandwich: Double Burger, Fromage, Cornichon, Salade', 6.9, 'b3.png', 2),
(10, 'Chicken', 'Sandwich: Poulet Frit, Tomate, Salade, Mayonnaise', 5.9, 'b4.png', 2),
(11, 'Fish', 'Sandwich: Poisson PanÃ©, Salade, Mayonnaise, Cornichon', 6.5, 'b5.png', 2),
(12, 'Double Steak', 'Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate', 7.5, 'b6.png', 2),
(13, 'Frites', 'Pommes de terre frites', 3.9, 's1.png', 3),
(14, 'Onion Rings', 'Rondelles d''oignon frits', 3.4, 's2.png', 3),
(15, 'Nuggets', 'Nuggets de poulet frits', 5.9, 's3.png', 3),
(16, 'Nuggets Fromage', 'Nuggets de fromage frits', 3.5, 's4.png', 3),
(17, 'Ailes de Poulet', 'Ailes de poulet Barbecue', 5.9, 's5.png', 3),
(18, 'CÃ©sar Poulet PanÃ©', 'Poulet PanÃ©, Salade, Tomate et la fameuse sauce CÃ©sar', 8.9, 'sa1.png', 4),
(19, 'CÃ©sar Poulet GrillÃ©', 'Poulet GrillÃ©, Salade, Tomate et la fameuse sauce CÃ©sar', 8.9, 'sa2.png', 4),
(20, 'Salade Light', 'Salade, Tomate, Concombre, MaÃ¯s et Vinaigre balsamique', 5.9, 'sa3.png', 4),
(21, 'Poulet PanÃ©', 'Poulet PanÃ©, Salade, Tomate et la sauce de votre choix', 7.9, 'sa4.png', 4),
(22, 'Poulet GrillÃ©', 'Poulet GrillÃ©, Salade, Tomate et la sauce de votre choix', 7.9, 'sa5.png', 4),
(23, 'Coca-Cola', 'Au choix: Petit, Moyen ou Grand', 1.9, 'bo1.png', 5),
(24, 'Coca-Cola Light', 'Au choix: Petit, Moyen ou Grand', 1.9, 'bo2.png', 5),
(25, 'Coca-Cola ZÃ©ro', 'Au choix: Petit, Moyen ou Grand', 1.9, 'bo3.png', 5),
(26, 'Fanta', 'Au choix: Petit, Moyen ou Grand', 1.9, 'bo4.png', 5),
(27, 'Sprite', 'Au choix: Petit, Moyen ou Grand', 1.9, 'bo5.png', 5),
(28, 'Nestea', 'Au choix: Petit, Moyen ou Grand', 1.9, 'bo6.png', 5),
(29, 'Fondant au chocolat', 'Au choix: Chocolat Blanc ou au lait', 4.9, 'd1.png', 6),
(30, 'Muffin', 'Au choix: Au fruits ou au chocolat', 2.9, 'd2.png', 6),
(31, 'Beignet', 'Au choix: Au chocolat ou Ã  la vanille', 2.9, 'd3.png', 6),
(32, 'Milkshake', 'Au choix: Fraise, Vanille ou Chocolat', 3.9, 'd4.png', 6),
(33, 'Sundae', 'Au choix: Fraise, Caramel ou Chocolat', 4.89, 'd5.png', 6);

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `login` varchar(22) NOT NULL,
  `pass` varchar(22) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `utilisateurs` (`login`, `pass`) VALUES
('TDM', '123');

ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`numcommande`) REFERENCES `commande` (`num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `achat_ibfk_2` FOREIGN KEY (`iditem`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`email`) REFERENCES `client` (`email`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;