-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Dez 2017 um 15:46
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `vthblumen`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `last_log_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `last_log_date`) VALUES
(1, 'vth', 'vthblumen', '2017-11-20');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `bestellnummer` int(11) NOT NULL,
  `anfrage` text COLLATE utf8mb4_german2_ci NOT NULL,
  `date_added` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `bestellnummer`, `anfrage`, `date_added`) VALUES
(1, 'vu thu huong', 'vth@gmail.com', 1, 'Testing', '2017-12-08'),
(2, 'Maria', 'aqua@gmail.com', 2, 'I hope this help', '2017-12-11'),
(3, 'Aqua', 'aqua@gmail.com', 3, 'PLsssssssssss', '2017-12-11'),
(4, 'marine', 'marine@gmail.com', 4, 'common css', '2017-12-11'),
(5, 'maria', 'marine@gmail.com', 8, 'testing', '2017-12-11'),
(6, 'maria', 'marine@gmail.com', 5, 'testttttttttt', '2017-12-11'),
(7, 'aa', 'aqua@gmail.com', 1, 'aa', '2017-12-11'),
(8, 'r', 'aqua@gmail.com', 1, 'a', '2017-12-11'),
(9, 'maria', 'marine@gmail.com', 1, 'testing', '2017-12-11'),
(10, 'vu thu huong', 'vth@gmail.com', 3, 'plssssss', '2017-12-11'),
(11, 'Aqua', 'aqua@gmail.com', 3, 'I hope this work', '2017-12-13'),
(12, 'maria', 'marine@gmail.com', 1, 'come on', '2017-12-13'),
(13, 'Maria', 'marine@gmail.com', 1, 'haizzzzzzzz', '2017-12-13'),
(14, 'maria', 'marine@gmail.com', 1, 'this is true despair', '2017-12-13'),
(15, 'maria', 'marine@gmail.com', 1, 'this is true despair', '2017-12-13'),
(16, 'maria', 'marine@gmail.com', 1, 'this is true despair', '2017-12-13'),
(17, 'maria', 'marine@gmail.com', 1, 'this is true despair', '2017-12-13');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` enum('Angebot','Kranz','Blumenstraeusse','Adventsgesteck','Amaryllis','Rosen','Dekoration') COLLATE utf8mb4_german2_ci NOT NULL,
  `detail` mediumtext COLLATE utf8mb4_german2_ci NOT NULL,
  `date_added` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `category`, `detail`, `date_added`) VALUES
(1, 'Adventskranz Noelle und GRATIS Lebkuchen', '24.99', 'Kranz', 'Spüren Sie den Zauber der Adventszeit!\r\n\r\nEin handgebundener Adventskranz aus Koniferen-Mix (Durchmesser ca. 25cm) bringt den Zauber der Vorweihnachtszeit in Ihr Zuhause.\r\nZimtstangen, Deko-Beeren, ein glitzernder Stern und zwei wunderschöne Schleifen harmonieren mit dem leuchtenden Rot der vier Kerzen.\r\n\r\nGRATIS dazu: Eine Packung (200g) Lebkuchen³. Nur zu ausgewählten Sträußen. Die Lebkuchen können Spuren von Schalenfrüchten, Milch und Erdnüssen enthalten. Lieferung solange Vorrat reicht.\r\n', '2017-12-10'),
(2, 'Adventskranz Glanz', '39.99', 'Kranz', 'Freuen Sie sich auf eine himmlische Zeit!\r\n\r\nEin handgebundener Adventskranz aus Koniferen-Mix (Durchmesser ca. 30 cm) stimmt mit seinen vier roten Kerzen auf die festliche Zeit des Jahres ein. \r\n\r\nGlänzende und matte Christbaumkugeln in traditionellem Rot und kleine Sterne werden umrahmt von goldenen Metallstreifen und verleihen unserem Advenskranz seine elegante Ausstrahlung.', '2017-12-10'),
(3, 'Adventskranz Skadi', '42.99', 'Kranz', 'Weiße Weihnacht steht vor der Tür!\r\n\r\nEin handgebundener Adventskranz aus Koniferen-Mix (Durchmesser ca. 30cm) ist liebevoll mit weißen Dekosternen und Tannenzapfen dekoriert.\r\n\r\nVier weiße Kerzen und glänzende und matt schimmernde Kugeln in Silber sorgen für ein besonders elegantes und festliches Ambiente.', '2017-12-10'),
(4, 'Blumenstrauß Wintertraum und GRATIS Lebkuchen', '24.99', 'Blumenstraeusse', 'Verschenken Sie Winterfreude!\r\n\r\nDas intensive Orange von je zwei Rosen und Germini sowie der getrockneten Orangenscheiben, eingebettet in frisches Grün, bringt diesen Strauß zum Strahlen. Dekorative Accessoires wie Zapfen, Zimt und Deko-Äpfel machen Lust auf gemütliche Stunden Zuhause.\r\n\r\nGRATIS dazu: Eine Packung (200g) Lebkuchen³. Nur zu ausgewählten Sträußen. Die Lebkuchen können Spuren von Schalenfrüchten, Milch und Erdnüssen enthalten. Lieferung solange Vorrat reicht.', '2017-12-10'),
(5, 'Blumenstrauß Sehnsucht', '22.99', 'Blumenstraeusse', 'Grüße, die einfach von Herzen kommen!\r\n\r\nEin Herz aus drei rosafarbenen Rosen und zwei Germini, arrangiert mit je einer Spraynelke und Santini in leuchtendem Pink sowie zarter Waxflower und frischem Grün, zaubert ein Lächeln in das Gesicht der Beschenkten.\r\n\r\nLassen Sie Ihr Herz sprechen!', '2017-12-10'),
(6, 'Blumenstrauß Love Letter', '36.99', 'Blumenstraeusse', 'Ein Arm voll roter Rosen direkt vom Anbauer zu Ihnen nach Hause - so frisch wie selbstgepflückt.\r\n\r\nDiese langstieligen Edel-Rosen (ca. 60cm) bestechen durch ihre samtig-weichen, dunkelroten Blütenblätter. In einer hohen Bodenvase entfalten diese Rosen ihre Schönheit am besten. Dekorieren Sie Ihr Zuhause ganz nach Ihren Wünschen!', '2017-12-10'),
(7, 'Blumenstrauß Liebesgedicht', '84.99', 'Blumenstraeusse', 'Perfekt nicht nur für besondere Momente, sondern für einen besonderen Menschen!\r\n\r\nDieses Arrangement aus 30 roten, großköpfigen Rosen erobert jedes Herz im Sturm! Nicht umsonst wird die Grand Prix Rose als Königin der Rosen bezeichnet, denn sie überzeugt durch ihre tief-roten, samtig-weichen und voluminösen Blütenköpfe.\r\n\r\nFunkelnde Herzen am Golddraht setzen Highlights und unterstreichen zusammen mit rotem Hypericum, einer dekorativen Ranke aus Efeu sowie frischem Grün die romantische Anmutung dieses Bouquets.', '2017-12-10'),
(8, 'Blumenstrauß Harmonia', '24.99', 'Blumenstraeusse', 'Ein erfrischender Blumengruß für jede Gelegenheit!\r\n\r\nRosen, Germini und Santini erstrahlen in leuchtendem Weiß und Creme harmonieren mit dem pastelligen Grün einer Nelke. Duftender Lavendel und eine Manschette aus frischem Grün verleihen diesem Arrangement eine ganz besondere Anmutung.', '2017-12-10'),
(9, 'Adventsgesteck Sternenfänger', '24.99', 'Adventsgesteck', 'Stimmungsvoller Glanz!\r\n\r\nUnser dekoratives Advents-Arrangement in einem silberfarbenen Topf überbringt vorweihnachtliche Grüße.\r\n\r\nDas Zusammenspiel von glänzenden Christbaumkugeln, Sternen, glitzerndem Farn, Zapfen und frischem Tannengrün zaubert im Nu ein besinnliches Ambiente!', '2017-12-10'),
(10, 'Blumenstrauß Weihnachtsstern', '22.99', 'Blumenstraeusse', 'Ein leuchtender Stern erhellt den Winterhimmel!\r\n\r\nJe zwei Germini und zwei Rosen lassen unser Bouquet in weihnachtlichem Rot erstrahlen. Mit gold-glänzenden Christbaumkugeln, goldfarbenem Gypso und duftenden Zapfen, Orangenscheiben und Zimt auf einer dekorativen Sternmanschette arrangiert, überbringt diese festlich anmutende Kreation wärmende Grüße in der kalten Jahreszeit!', '2017-12-10'),
(11, 'Blumenstrauß Winterprinzessin', '37.99', 'Blumenstraeusse', 'Romantische Weihnachtszeit!\r\n\r\nDiese üppige Blütenpracht aus sechs Rosen, drei Germini, Hypericum, zartem Gypso und einer Amaryllis vereint Romantik und Eleganz in einer Kreation. Farblich passende Christbaumkugeln, gefärbte Zapfen sowie frisches Tannengrün verleihen unserem Bouquet eine festliche Note.', '2017-12-10'),
(12, 'Adventsgesteck Goldschimmer', '24.99', 'Adventsgesteck', 'Unser Goldstück!\r\n\r\nGlänzende Christbaumkugeln und Engelshaar verleihen unserem zauberhaften Adventsgesteck (Gesamthöhe ca. 20cm) seine elegante Ausstrahlung. Dazu bilden Zapfen, Zimt, frisches Tannengrün und der passende Topf eine harmonische Ergänzung.\r\n\r\nVerschenken Sie einen goldenen Advent!', '2017-12-10'),
(13, 'Blumenstrauß Christmas Shine', '29.99', 'Blumenstraeusse', 'Lassen Sie ihr Zuhause leuchten!\r\n\r\nDieser Strauß ist durch seine integrierte Lichterkette (Lieferung inkl. Batterien) eine strahlende Erscheinung. Weihnachtliches Rot und Grün von Christbaumkugeln in verschiedenen Größen sowie glitzerndem Engelshaar, arrangiert mit Zapfen, Zimt und frischem Tannengrün harmonieren wunderbar mit den strahlenden Lichtern der integrierten Lichterkette.\r\n\r\nDieser Strauß bereitet dem Beschenkten wochenlang Freude, da er überwiegend aus haltbaren Bestandteilen besteht.', '2017-12-10'),
(14, 'Amaryllis im Glas rot-weiß und Xmas-Goldtraum-Piccolo', '32.99', 'Amaryllis', 'Amaryllis - die Königin unter den Weihnachtsblüten!\r\n\r\nDie ursprünglich aus Südafrika stammende Amaryllis ist aus der Advents- und Weihnachtszeit nicht mehr wegzudenken. Die rot-weißen ausladenden Blütenkelche bringen festliche Stimmung in die kalte Jahreszeit.\r\n\r\nIhre wahre Pracht entfaltet Sie bei Ihnen zu Hause: die bei Lieferung noch knospige Amaryllis treibt nach ca. einer Woche aus und blüht danach zu ihrer vollen Schönheit auf. Die Blüten die einen Durchmesser von bis zu 15 cm erreichen, kommen in der Glasvase, arrangiert mit Christbaumkugeln (Farbe kann variieren), Moos, getrockneten Zweigen und einem Stern besonders schön zur Geltung.\r\n\r\nDazu ein himmlischer Genuss, der früher Königen und Fürsten vorbehalten war und als wahrer Jungbrunnen galt: Unser mit 22-karätigem Blattgold-Glimmer veredelter Goldtraum-Piccolo (0,2 l; 10,0 % vol.) mit weihnachtlichem Etikett Frohes Fest.\r\n\r\nKeine Abgabe an Personen unter 16 Jahren.', '2017-12-10'),
(15, 'Blumenstrauß Für meinen Star', '24.99', 'Blumenstraeusse', 'Für Ihren Star! \r\n\r\nEine wunderschöne Aufmerksamkeit, ob zum Valentinstag oder einfach nur so. Ihr Star hat einen Blumengruß verdient. Die ursprünglich aus Peru stammende Alstromerie, auch Inkalie genannt, ist eine wahre Schönheit. 12 Alstromerien (Länge 60cm) ergeben ein wahres Blütenmeer in zarten Tönen von Rosa, Gelb und Weiß.\r\n\r\nBitte beachten Sie: abgebildete Vase nicht im Lieferumfang enthalten.\r\n\r\nBitte beachten Sie, dass die Knospen bei der Ankunft noch geschlossen sind. Diese entfalten in den kommenden Tagen ihre volle Schönheit.\r\n\r\nSo hat der Beschenkte besonders lange Freude an der wunderschönen Blütenpracht.\r\n\r\nMachen Sie einem lieben Menschen eine Freude oder machen Sie sich selbst ein Geschenk und verschönern Sie Ihr Zuhause! ', '2017-12-10'),
(16, 'Blumenstrauß Magic Christmas', '29.99', 'Blumenstraeusse', 'Magische Weihnachtszeit!\r\n\r\nEine große Amaryllisblüte (mehrblütig) erstrahlt in der Mitte dieser verträumten Kreation, umrahmt von Germini und einer Nelke in zartem Rosé. Festlich glänzende Christbaumkugeln, ein Stern, Zapfen sowie frisches Tannengrün machen unser Arrangement perfekt.', '2017-12-10'),
(17, 'Kerzenhalter Feliz', '19.99', 'Dekoration', 'Stimmungsvoller Glanz!\r\n\r\nUnser dekoratives Advents-Arrangement in einem Holz-Kerzenhalter mit Stern-Ornamenten an den Seitenteilen und einer dekorativen Kordel überbringt vorweihnachtliche Grüße.\r\n\r\nDas Zusammenspiel einer glänzend grünen Kerze mit funkelnden Christbaumkugeln, getrockneten Zweigen, einem Zapfen und  künstlichem Grün von Kiefer und Konifere zaubert im Nu ein besinnliches Ambiente!', '2017-12-10'),
(18, 'Türkranz Snowy', '22.99', 'Kranz', 'Ein winterliches Willkommen!\r\n\r\nMit unserem haltbaren Türkranz (Durchmesser ca. 24cm) aus Zapfen heißen Sie Ihre Gäste auf das schönste Willkommen!\r\n\r\nKünstliche Beeren in weihnachtlichem Rot und eine dekorative Filzkordel die an Schneeflocken erinnert bringen den Zauber der Winterzeit in jedes Haus. Ob als Tisch-Deko oder als Türschmuck - unser Kranz sorgt für winterliches Flair.', '2017-12-10'),
(19, 'Deko-Vase Christmas (40cm)', '27.99', 'Dekoration', 'Glasvase festlich inszeniert!\r\n\r\nDieses dekorative Highlight bringt Glanz und Gloria in jedes Zuhause. In einer 40cm hohen Glasvase leuchten funkelnde Christbaumkugeln und Drahtbälle in weihnachtlichem Rot.\r\n\r\nUmspielt von Kokossternen, getrockneten Zweigen und künstlichem Tannengrün verströmen Kiefernzapfen sowie Zimtstangen einen weihnachtlich-anheimelnden Duft und setzen Akzente!', '2017-12-10'),
(20, 'Wax-Amaryllis Gold Glitter', '19.99', 'Amaryllis', 'Bereiten Sie ihren Liebsten eine Freude, die noch lange nach dem Fest anhält!\r\n\r\nDie rot-blühende Amaryllis-Zwiebel ist eingepackt in einer gold-glitzernden Wax-Hülle. Sie benötigt weder Erde noch Wasser.\r\n\r\nEin sonniger Platz auf der Fensterbank genügt und innerhalb von 4-6 Wochen lässt sie ihre leuchtend roten Blüten erstrahlen.\r\n\r\nDie Lieferung der Amaryllis erfolgt mit geschlossenen Blüten im Geschenkkarton.', '2017-12-10'),
(21, 'Christrose im Topf', '22.99', 'Rosen', 'Ein zauberhaftes Geschenk, mit dem Sie noch lange in Erinnerung bleiben werden.\r\n\r\nDie Christrose, die aufgrund ihrer zart-weißen Blütenblätter auch Schneerose genannt wird, ist mit Ihrer Blütenpracht eine winterliche Schönheit und ein Hingucker in jedem Zuhause.\r\n\r\nEin dekorativer Sisalstern und der gold-marmorierte Übertopf (Höhe 10 cm) setzen weihnachtliche Akzente.\r\n\r\nDie immergrüne mehrjährige Pflanze kann als Gartenzierpflanze verwendet werden und macht dem Beschenkten noch lange nach Weihnachten Freude.', '2017-12-10'),
(22, 'Blumenstrauß Besinnlichkeit	', '29.99', 'Blumenstraeusse', 'Verschenken Sie magische Momente!\r\n\r\nDrei leuchtend-orangefarbene Germini, eine zauberhafte Amaryllis (mehrblütig) sowie Christbaumkugeln in wärmendem Farben sind mit tiefrotem Hypericum, duftendem Zimt, einem Zapfen und Orangenscheiben sowie frischem Grün zu einer stimmungsvollen Komposition vereint.', '2017-12-10'),
(23, 'Blumenstrauß Zauberstern', '26.99', 'Blumenstraeusse', 'Sternstunden zu verschenken!\r\n\r\nVerschenken Sie Sternstunden mit diesem außergewöhnlichen Bouquet aus je einer Lilie, einem Lisianthus in strahlendem Weiß und cremefarbenen Rosen. Dieses Bouquet wird wunderschön arrangiert mit goldenen Sternen, einer Christbaumkugel, Zimtbündeln und goldenem Eukalyptus.\r\n\r\nMit diesem entzückenden Bouquet schaffen Sie wahre Sternstunden.', '2017-12-10'),
(24, 'Konifere im Glastopf', '19.99', 'Dekoration', 'Das Deko-Highlight für die Adventszeit!\r\n\r\nUnsere echte Konifere (Gesamthöhe ca. 30-35cm) überbringt Ihre lieben Adventsgrüße. Geschmackvoll arrangiert mit einem Anhänger in Form einer Schneeflocke in einem Glastopf zaubert die Pflanze sofort eine besinnliche Stimmung. Und das schönste daran: die Konifere kann später einfach im Garten eingepflanzt werden und Ihr Geschenk bleibt noch lange in guter Erinnerung.', '2017-12-10'),
(25, 'Rosenbouquet gelb-orange Premium', '24.99', 'Rosen', 'Ein Arm voll leuchtend gelb-orangefarbener Rosen direkt vom Anbauer zu Ihnen nach Hause - so frisch wie selbstgepflückt.\r\n\r\nDiese 23 langstieligen Edel-Rosen (ca. 40-50cm) bestechen durch ihre samtig-weichen, Blütenblätter in leuchtendem Gelb-Orange. In einer hohen Bodenvase entfalten diese Rosen ihre Schönheit am besten. Dekorieren Sie Ihr Zuhause ganz nach Ihren Wünschen!', '2017-12-10'),
(26, 'Blumenstrauß Paradies', '42.99', 'Blumenstraeusse', 'Dieser prächtige voluminöse Strauß aus Rosen, Spraynelken, Germini und Lisianthus in zartem Gelb und Rosa sowie strahlendem Weiß überzeugt mit seiner edlen Anmutung. Dekoratives Beargras, Bupleurum und frisches Grün runden das Arrangement ab.\r\n\r\nBitte beachten Sie: eine Lieferung an einen Friedhof ist nicht möglich. Bitte wählen Sie die Adresse des Trauerhauses oder des Bestattungsunternehmens.', '2017-12-10'),
(27, 'Blumenstrauß Modena', '31.99', 'Blumenstraeusse', 'Eine elegante Kreation aus Rosen, Germini, Lilien, Santini und Lisianthus in zarten Weißtönen. Bupleurum, Aralie und frisches Grün unterstreichen die natürliche Anmutung.\r\n\r\nBitte beachten Sie: eine Lieferung an einen Friedhof ist nicht möglich. Bitte wählen Sie die Adresse des Trauerhauses oder des Bestattungsunternehmens.', '2017-12-10'),
(28, 'Blumenstrauß Zuckerstange', '32.99', 'Blumenstraeusse', 'Zuckersüße Weihnachtszeit!\r\n\r\nRosen, Germini und Spraynelken in verschiedenen Rosa- und Pinktönen lassen unsere Kreation leuchten. Farblich passende Christbaumkugeln, ein weißer Zapfen und eine glänzende Deko-Zuckerstange fügen sich harmonisch ein und bilden einen wunderschönen Farbkontrast zu dem frischen Tannengrün.', '2017-12-10'),
(29, 'Blumenstrauß Winterkönigin', '59.99', 'Blumenstraeusse', 'Verschenken Sie himmlische Zeiten!\r\n\r\nAm schönsten mit diesem eleganten Traum aus Rosen und Germini in verschiedenen Farbtönen, Zapfen, Deko-Beeren und Christbaumkugeln, umrahmt von Tannengrün.\r\n\r\nSeinen festlichen Glanz erhält dieses üppige Bouquet auch durch einen prunkvollen Glas-Stern.\r\n\r\nEin Strauß, so prachtvoll und festlich, dass er jedes Herz im Sturm erobert.', '2017-12-10'),
(30, 'Blumenstrauß Blütentraum und Champagner Veuve Clicquot', '63.99', 'Blumenstraeusse', 'So freundlich und strahlend wie die ersten Sonnenstrahlen des Tages!\r\n\r\nEine orangefarbene Lilie, Germini im zarten Gelb-Ton sowie Sprayrosen und Lisianthus in leuchtendem Rosa und Gelb lassen diesen heiteren Strauß strahlen und zeigen dem Beschenkten dass Sie an ihn denken.\r\n\r\nDekorative Gräser, blaue Statize, zartes Bupleurum, lila Santini und frisches Grün verleihen diesem Arrangement eine außergewöhnliche Note.\r\n\r\nEin Blütentraum der Freude schenkt!\r\n\r\nDazu der edle Champagner Veuve Clicquot (0,375l; 12% vol.)! Eine ausgewogene Cuveé, abgerundet mit einem feinen und lebhaften Charakter. Anspruchsvoll aber dennoch frisch durch einen hohen Pinot Noir-Anteil. Er besticht durch seine Eleganz, seine ausgeprägte Struktur, seine Finesse und sein raffiniertes Bouquet.\r\nDie Lieferung erfolgt in einer edlen Präsentkartonage.\r\n\r\nKeine Abgabe an Personen unter 16 Jahren.', '2017-12-10'),
(31, 'Adventskranz Noelle und GRATIS Lebkuchen', '24.99', 'Angebot', 'Spüren Sie den Zauber der Adventszeit!\r\n\r\nEin handgebundener Adventskranz aus Koniferen-Mix (Durchmesser ca. 25cm) bringt den Zauber der Vorweihnachtszeit in Ihr Zuhause.\r\nZimtstangen, Deko-Beeren, ein glitzernder Stern und zwei wunderschöne Schleifen harmonieren mit dem leuchtenden Rot der vier Kerzen.\r\n\r\nGRATIS dazu: Eine Packung (200g) Lebkuchen³. Nur zu ausgewählten Sträußen. Die Lebkuchen können Spuren von Schalenfrüchten, Milch und Erdnüssen enthalten. Lieferung solange Vorrat reicht.\r\n', '2017-12-10'),
(32, 'Blumenstrauß Wintertraum und GRATIS Lebkuchen', '24.99', 'Angebot', 'Verschenken Sie Winterfreude!\r\n\r\nDas intensive Orange von je zwei Rosen und Germini sowie der getrockneten Orangenscheiben, eingebettet in frisches Grün, bringt diesen Strauß zum Strahlen. Dekorative Accessoires wie Zapfen, Zimt und Deko-Äpfel machen Lust auf gemütliche Stunden Zuhause.\r\n\r\nGRATIS dazu: Eine Packung (200g) Lebkuchen³. Nur zu ausgewählten Sträußen. Die Lebkuchen können Spuren von Schalenfrüchten, Milch und Erdnüssen enthalten. Lieferung solange Vorrat reicht.', '2017-12-10'),
(33, 'Amaryllis im Glas rot-weiß und Xmas-Goldtraum-Piccolo', '32.99', 'Angebot', 'Amaryllis - die Königin unter den Weihnachtsblüten!\r\n\r\nDie ursprünglich aus Südafrika stammende Amaryllis ist aus der Advents- und Weihnachtszeit nicht mehr wegzudenken. Die rot-weißen ausladenden Blütenkelche bringen festliche Stimmung in die kalte Jahreszeit.\r\n\r\nIhre wahre Pracht entfaltet Sie bei Ihnen zu Hause: die bei Lieferung noch knospige Amaryllis treibt nach ca. einer Woche aus und blüht danach zu ihrer vollen Schönheit auf. Die Blüten die einen Durchmesser von bis zu 15 cm erreichen, kommen in der Glasvase, arrangiert mit Christbaumkugeln (Farbe kann variieren), Moos, getrockneten Zweigen und einem Stern besonders schön zur Geltung.\r\n\r\nDazu ein himmlischer Genuss, der früher Königen und Fürsten vorbehalten war und als wahrer Jungbrunnen galt: Unser mit 22-karätigem Blattgold-Glimmer veredelter Goldtraum-Piccolo (0,2 l; 10,0 % vol.) mit weihnachtlichem Etikett Frohes Fest.\r\n\r\nKeine Abgabe an Personen unter 16 Jahren.', '2017-12-10'),
(34, 'Blumenstrauß Blütentraum und Champagner Veuve Clicquot', '63.99', 'Angebot', 'So freundlich und strahlend wie die ersten Sonnenstrahlen des Tages!\r\n\r\nEine orangefarbene Lilie, Germini im zarten Gelb-Ton sowie Sprayrosen und Lisianthus in leuchtendem Rosa und Gelb lassen diesen heiteren Strauß strahlen und zeigen dem Beschenkten dass Sie an ihn denken.\r\n\r\nDekorative Gräser, blaue Statize, zartes Bupleurum, lila Santini und frisches Grün verleihen diesem Arrangement eine außergewöhnliche Note.\r\n\r\nEin Blütentraum der Freude schenkt!\r\n\r\nDazu der edle Champagner Veuve Clicquot (0,375l; 12% vol.)! Eine ausgewogene Cuveé, abgerundet mit einem feinen und lebhaften Charakter. Anspruchsvoll aber dennoch frisch durch einen hohen Pinot Noir-Anteil. Er besticht durch seine Eleganz, seine ausgeprägte Struktur, seine Finesse und sein raffiniertes Bouquet.\r\nDie Lieferung erfolgt in einer edlen Präsentkartonage.\r\n\r\nKeine Abgabe an Personen unter 16 Jahren.', '2017-12-10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_account`
--

CREATE TABLE `user_account` (
  `id` int(4) NOT NULL,
  `vorname` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `nachname` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `geschlecht` enum('maennlich','weiblich','andere') COLLATE utf8mb4_german2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `passwort` varchar(40) COLLATE utf8mb4_german2_ci NOT NULL,
  `strasse` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `nummer` int(11) NOT NULL,
  `plz` int(11) NOT NULL,
  `stadt` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `date_added` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `user_account`
--

INSERT INTO `user_account` (`id`, `vorname`, `nachname`, `geschlecht`, `email`, `username`, `passwort`, `strasse`, `nummer`, `plz`, `stadt`, `date_added`) VALUES
(1, 'Thu Huong', 'Vu', 'maennlich', 'vth@gmail.com', 'vuthuhuong', 'vth', 'Birkenallee', 50, 15745, 'Wildau', '2017-12-08'),
(2, 'Maria', 'Crextasy', 'weiblich', 'maria_crextasy@gmail.com', 'maria', 'crextasy', 'Birkenallee', 50, 15745, 'Wildau', '2017-12-08');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT für Tabelle `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
