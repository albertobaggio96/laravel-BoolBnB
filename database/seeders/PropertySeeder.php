<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

use App\Models\Property;

class PropertySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            [	//1
                'title' => 'Chalet di lusso Black Pearl con piscina, sauna e vasca idromassaggio',
                'description' => 'Renaissance Prestige Properties è lieta di consigliarvi lo chalet di lusso Black Pearl situato a Chamonix, sul Monte Bianco. Si trova in una posizione ideale ai piedi delle montagne e vicino alla funivia Flégère.',
                'user_id' => 1,
                'night_price' => 400,
                'n_beds' => 4,
                'n_rooms' => 2,
                'cover_img' => 'property_image/1/cover_image.webp',
                'n_bathroom' => 2,
                'mq' => 150,
                'visible' => 1,
                'address' => 'Piazza San Marco, 1 - Venezia, Veneto',
                'latitude' => 45.43424,
                'longitude' => 12.33805
            ],
            [	//2
                'title' => 'Villa Front Lake',
                'description' => 'Villa Front Lake è una residenza di lusso senza pari sul lago di Como. Dotata di design e arredi spettacolari, viste panoramiche e splendidi giardini paesaggistici, questa storica villa con sette camere da letto offre un ambiente incomparabile di privacy e classe, rendendola forse la migliore casa vacanze per riunioni di famiglia o ospiti di matrimoni di destinazione sulle rive esclusive di Como. Circondata da un parco privato squisitamente curato, Villa Front Lake si erge con grazia sulla riva di Como come un palazzo in paradiso. La terrazza esterna vista lago dispone di una piscina simile a una laguna circondata da eleganti lettini, poltrone e ombrelloni; mentre si trova in riva al lago, un delizioso pergolato con tavolo da pranzo all\'aperto offre l\'ambiente ideale per i pasti insieme. Se desideri avventurarti in acqua, avrai a disposizione un motoscafo da 20 nodi e una barca lenta da 6 nodi, che potrai lanciare dal molo condiviso del terrapieno con la vicina Villa Batell. L\'interno della villa sfida la descrizione. È stato progettato, decorato e arredato con eleganza e gusto, evocando il fascino classico del Vecchio Mondo e arricchito dai migliori servizi moderni. In un salotto si trova un sontuoso salotto accanto a un trittico di portefinestre e un balcone con ampia vista sul lago, accompagnato da un pianoforte Steinway del 1911. Un secondo salotto è altrettanto bello, con un caminetto e una splendida pittura ritrattistica a grandezza naturale. La biblioteca adiacente, con incantevoli librerie e impianto audio, è realizzata per il relax contemplativo, mentre la sala da pranzo è semplicemente spettacolare, con il suo grande tavolo illuminato da uno splendido lampadario, un ambiente assolutamente da sogno per feste memorabili insieme. La cucina è completamente attrezzata, con elettrodomestici da chef, mentre un cuoco privato è al tuo servizio. Le sette camere da letto della villa sono altrettanto squisite. Ognuno ha il suo fascino unico e offre comfort e privacy assoluti. Le camere da letto al secondo piano sono capienti ed eleganti, con soffitti alti, ampie finestre e splendide viste, mentre le camere da letto al piano superiore sono incantevoli e da sogno, con soffitti inclinati e lucernari che osservano le stelle. Tutte e sette le camere da letto sono dotate di bagno interno. Oltre il tuo santuario privato a Villa Front Lake, ti troverai in una buona posizione per esplorare il Lake District d\'Italia. La città di Como dista solo cinque chilometri, e il Duomo di Como è raggiungibile a piedi in pochi minuti. Mendriso dista dieci chilometri dal cancello d\'ingresso.',
                'user_id' => 1,
                'night_price' => 1400,
                'n_beds' => 14,
                'n_rooms' => 7,
                'cover_img' => 'property_image/2/cover_image.webp',
                'n_bathroom' => 5,
                'mq' => 400,
                'visible' => 1,
                'address' => 'Via del Corso, 1 - Roma, Lazio',
                'latitude' => 41.90979,
                'longitude' => 12.47686
            ],
            [	//3
                'title' => 'Marvellous lake destination eco-friendly villa',
                'description' => 'Questa lussuosa Villa eco-friendly è situata direttamente sul Lago di Como, a Brienno, con un molo privato per le barche e accesso diretto al lago con una scala in acciaio. La Villa è di nuova costruzione seguendo tutti i criteri di un\'ecologia di classe A+ con pannelli solari per alimentare una pompa di calore e pannelli in silicio per isolare termicamente l\'intera casa. Il design degli interni è bello e moderno, etichettato Lema, Cassina, B&B e Clei',
                'user_id' => 1,
                'night_price' => 400,
                'n_beds' => 4,
                'n_rooms' => 3,
                'cover_img' => 'property_image/3/cover_image.webp',
                'n_bathroom' => 2,
                'mq' => 200,
                'visible' => 1,
                'address' => 'Piazza del Campo, 1 - Siena, Toscana',
                'latitude' => 43.318,
                'longitude' => 11.33175
            ],
            [	//4
                'title' => 'Chalet Orcianita',
                'description' => 'Lo Chalet Orcianita è una squisita casa di lusso a Megève, uno dei gioielli delle Alpi francesi. Lo chalet si trova in un bellissimo borgo a circa quattro chilometri dalla base della stazione sciistica e a poco più di un chilometro dalla corsa di La Princesse. I servizi in stile resort includono una piscina riscaldata e una sala cinema. Sei comode camere da letto, tra cui una superba suite padronale e una camera a castello adatta ai bambini, composta da quattordici ospiti, ideali per più famiglie o grandi gruppi di amici. (C\'è anche una stanza aggiuntiva per il personale o gli ospiti aggiuntivi.) La tua casa vacanze include servizi di pulizia e maggiordomo o chef in determinati periodi dell\'anno. Gli interni dello chalet bilanciano il fascino alpino vintage con un\'estetica elegante e moderna, visibile nei lampadari di design e nel superbo caminetto. Il salotto angolare vicino al focolare si affaccia su una spaziosa area salotto con soffitti alti e a picco, con comode sedie componibili e graziose poltrone a sacco. Versa cocktail nel bar deluxe e riunisciti per deliziosi pasti al tavolo da pranzo a forma di piazza per dodici persone. Ampie finestre infondono la casa con luce montana e vista su Aiguilles de Warens, mentre diversi balconi ti invitano ad assaporare la deliziosa aria. La moderna cucina è completamente attrezzata, con elettrodomestici da chef e frigo per il vino. La favolosa area spa della villa include una piscina coperta voluminosa, una vasca idromassaggio gorgogliante, una sauna, un hammam (bagno turco), una sala fitness e una piscina fredda. L\'eccezionale home cinema vanta un ampio schermo con proiettore e posti a sedere a più livelli, l\'ideale per gli appassionati di cinema. C\'è anche un ufficio a casa. Sono presenti quattro suite per gli ospiti con letti matrimoniali e bagni privati (due dei quali includono vasche da bagno); una di queste camere si apre sul terrazzo. La camera dei bambini ha due letti a castello e un bagno interno. L\'eccezionale camera da letto principale include un letto matrimoniale grande, un salotto, un balcone privato, una cabina armadio e un bagno interno con doppia toeletta, doccia e una splendida vasca autoportante. Lo Chalet Orcianita si trova a pochi minuti da La Princesses at Megève e a circa quattro chilometri dalla base del resort. Il centro della città, con alcuni dei migliori ristoranti e locali notturni delle Alpi francesi, è a soli tre chilometri di distanza.',
                'user_id' => 1,
                'night_price' => 1600,
                'n_beds' => 16,
                'n_rooms' => 7,
                'cover_img' => 'property_image/4/cover_image.webp',
                'n_bathroom' => 7,
                'mq' => 500,
                'visible' => 1,
                'address' => 'Via della Spiga, 1 - Milano, Lombardia',
                'latitude' => 45.4687,
                'longitude' => 9.19845
            ],
            [	//5
                'title' => 'Chalet dal design di lusso di fronte allo sci del Monte Bianco',
                'description' => 'Il design unico dello chalet, con finestre cinematografiche sul Monte Bianco, offre una fantastica esperienza durante il soggiorno nello chalet. Il salotto principale è il nido perfetto per un rifugio in montagna. ',
                'user_id' => 1,
                'night_price' => 800,
                'n_beds' => 8,
                'n_rooms' => 4,
                'cover_img' => 'property_image/5/cover_image.webp',
                'n_bathroom' => 4,
                'mq' => 300,
                'visible' => 1,
                'address' => 'Via Montenapoleone, 1 - Milano, Lombardia',
                'latitude' => 45.46729,
                'longitude' => 9.19625
            ],
            [	//6
                'title' => 'Loft in stile scandinavo all\'ombra della Mole',
                'description' => 'L\'appartamento, appena ristrutturato, affaccia verso la corte interna di un tipico palazzo torinese dell\'inizio dell\'800. È composto da un grande open space a doppia altezza, che ospita i servizi, la zona salotto e la zona pranzo con angolo cucina e tavolo. Da questo si passa alla prima zona notte, con letto matrimoniale (160x200 cm, divisibile in due letti singoli), per poi salire sul soppalco dove si trova la seconda zona notte, anch\'essa dotata di letto matrimoniale. Un terzo letto matrimoniale è presente nel living (divano-letto, 160x200 cm).',
                'user_id' => 1,
                'night_price' => 500,
                'n_beds' => 5,
                'n_rooms' => 2,
                'cover_img' => 'property_image/6/cover_image.webp',
                'n_bathroom' => 2,
                'mq' => 100,
                'visible' => 1,
                'address' => 'Via Condotti, 1 - Roma, Lazio',
                'latitude' => 41.90569,
                'longitude' => 12.48213
            ],
            [	//7
                'title' => 'Container Suite: sospeso tra terra e mare',
                'description' => 'Uno scrigno sofisticato, accogliente, immerso nella natura e dall’inconfondibile stile. Situato a Terrasini, in una meravigliosa valle affacciata sulla costa del Golfo di Castellammare, Container Suite, circondato da una rigogliosa distesa di fichi d’india, si integra nel paesaggio in perfetta armonia con il territorio circostante. Dal design unico, si contraddistingue per una grande vetrata sul golfo che proietta l’ospite in una modalità di sospensione.',
                'user_id' => 1,
                'night_price' => 200,
                'n_beds' => 2,
                'n_rooms' => 1,
                'cover_img' => 'property_image/7/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 100,
                'visible' => 1,
                'address' => 'Piazza Bra, 1 - Verona, Veneto',
                'latitude' => 45.43804,
                'longitude' => 10.99379
            ],
            [	//8
                'title' => 'Villa Arias',
                'description' => 'Con vista sul lago, la splendida villa Casa Arias a Tremosine sul Garda è perfetta per una vacanza rilassante. La proprietà a 3 piani è composta da un soggiorno, una cucina ben attrezzata con lavastoviglie, 5 camere da letto e 5 bagni e può quindi ospitare 10 persone. I servizi aggiuntivi includono la connessione Wi-Fi ad alta velocità, l\'aria condizionata, il riscaldamento, una lavatrice, un\'asciugatrice e una TV.',
                'user_id' => 2,
                'night_price' => 1000,
                'n_beds' => 10,
                'n_rooms' => 5,
                'cover_img' => 'property_image/8/cover_image.webp',
                'n_bathroom' => 4,
                'mq' => 300,
                'visible' => 1,
                'address' => 'Via Veneto, 1 - Roma, Lazio',
                'latitude' => 41.46178,
                'longitude' => 12.61496
            ],
            [	//9
                'title' => 'Appartamento di lusso a Santa Pola',
                'description' => 'Accogliente appartamento fronte mare vicinissimo a tutti i servizi come supermercati, centro, autobus, ecc... Completamente ristrutturato nel 2019. La casa ha un portiere fisico per risolvere qualsiasi problema o informazione.',
                'user_id' => 2,
                'night_price' => 600,
                'n_beds' => 6,
                'n_rooms' => 3,
                'cover_img' => 'property_image/9/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 120,
                'visible' => 1,
                'address' => 'Corso Vittorio Emanuele II, 1 - Napoli, Campania',
                'latitude' => 40.94595,
                'longitude' => 14.3749
            ],
            [	//10
                'title' => 'Ville esclusive con vasca idromassaggio all\'aperto',
                'description' => 'le possibilità di rilassarti e riconnetterti con l\'ambiente naturale. Puoi ammirare le stelle dalla tua piscina privata o sentire l\'odore della pioggia mentre ti godi un bagno caldo grazie alla posizione privilegiata della nostra vasca idromassaggio esterna coperta. Perché godersi la natura non è convertibile in termini di comfort.',
                'user_id' => 2,
                'night_price' => 200,
                'n_beds' => 2,
                'n_rooms' => 1,
                'cover_img' => 'property_image/10/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 90,
                'visible' => 1,
                'address' => 'Piazza Navona, 1 - Roma, Lazio',
                'latitude' => 41.89913,
                'longitude' => 12.4732
            ],
            [	//11
                'title' => 'Sea Cliff House',
                'description' => 'Considerata un\'icona architettonica della Costa di Granada. Si tratta di una casa unica costruita all\'interno della montagna, che offre una temperatura tutto l\'anno di 20 gradi. Il suo design esclusivo e gli arredi, il suo ponte ondulato, la sua spaziosa cucina integrata nell\'ampio salone di 150 metri che si affaccia sul Mar Mediterraneo lasciano senza fiato. La spiaggia è a 5 km per gli sport acquatici e se preferisci il freddo in inverno puoi goderti lo sci in Sierra Nevada.',
                'user_id' => 2,
                'night_price' => 600,
                'n_beds' => 6,
                'n_rooms' => 3,
                'cover_img' => 'property_image/11/cover_image.webp',
                'n_bathroom' => 3,
                'mq' => 190,
                'visible' => 1,
                'address' => 'Piazza del Duomo, 1 - Firenze, Toscana',
                'latitude' => 43.77353,
                'longitude' => 11.25632
            ],
            [	//12
                'title' => 'Casa Doro',
                'description' => 'Un angolo molto bello, con una splendida vista. Immersa in una natura sana, fiumi, villaggi, montagne... Perfetto per vivere momenti speciali e ricaricarsi. La casa è molto confortevole, insieme al ronzio dei ruscelli che la circondano, offre un\'atmosfera perfetta per rilassarsi.',
                'user_id' => 3,
                'night_price' => 600,
                'n_beds' => 6,
                'n_rooms' => 2,
                'cover_img' => 'property_image/12/cover_image.webp',
                'n_bathroom' => 2,
                'mq' => 120,
                'visible' => 1,
                'address' => 'Via San Gregorio Armeno, 1 - Napoli, Campania',
                'latitude' => 40.85056,
                'longitude' => 14.25759
            ],
            [	//13
                'title' => 'Appartamento Buganvilla',
                'description' => 'Il nostro appartamento Buganvilla è ideale se si vuole godere della vicinanza al mare ma allo stesso tempo della tranquillità e della calma che trasmettono le Olive. Offre privacy con veranda privata e terrazza, mentre si condividono momenti con gli host in piscina e nel resto delle aree comuni della tenuta, giocano la Petanque, Diana e altre attività all\'aperto. L\'appartamento è ideale per coppie o amici che vogliono divertirsi e riposare. Ti aspettiamo!',
                'user_id' => 3,
                'night_price' => 200,
                'n_beds' => 2,
                'n_rooms' => 1,
                'cover_img' => 'property_image/13/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 80,
                'visible' => 1,
                'address' => 'Corso Umberto I, 1 - Catania, Sicilia',
                'latitude' => 37.61364,
                'longitude' => 15.16568
            ],
            [	//14
                'title' => 'Cannes Croisette',
                'description' => 'Situato sotto il tetto troverete un accogliente appartamento con 1 camera da letto completamente ristrutturato con attrezzature e materiali di fascia alta. Numero 1 posizione "piazza d\'oro" tra la famosa Croisette e rue d\'Antibes strada dello shopping. Ogni dettaglio ha lo scopo di darti il massimo comfort e farti sentire come in una suite d\'albergo.',
                'user_id' => 3,
                'night_price' => 200,
                'n_beds' => 2,
                'n_rooms' => 1,
                'cover_img' => 'property_image/14/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 80,
                'visible' => 1,
                'address' => 'Piazza Unità d\'Italia, 1 - Trieste, Friuli-Venezia Giulia',
                'latitude' => 45.65015,
                'longitude' => 13.76694
            ],
            [	//15
                'title' => 'Accogliente cottage immerso nella natura',
                'description' => 'Accogliente, completamente attrezzato di 19 m2 in campagna con il suo splendido panorama. Ideale per rilassarsi o lavorare da remoto con WiFi (persone in movimento). Lo chalet dispone di un parcheggio privato e di una terrazza non trascurata. Troverai un soggiorno/soggiorno che include una cucina completamente attrezzata, una zona pranzo e un bagno. Sul soppalco un letto per due persone e una BZ con comoda biancheria da letto al piano terra. Situato sulle Alpi Mancelles tra Alençon e Le Mans.',
                'user_id' => 3,
                'night_price' => 200,
                'n_beds' => 2,
                'n_rooms' => 1,
                'cover_img' => 'property_image/15/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 80,
                'visible' => 1,
                'address' => 'Via Toledo, 1 - Napoli, Campania',
                'latitude' => 40.84814,
                'longitude' => 14.24962
            ],
            [	//16
                'title' => 'Cocooning boudoir My St marc',
                'description' => 'Ecco un grazioso appartamento che chiamiamo"My Cocooningr Boudoir" completamente attrezzato e ristrutturato da una coppia di artigiani e decoratori! Non vi mancherà nulla e vi sentirete davvero bene! Gli spazi più piccoli sono pensati per il tuo benessere! Ingresso privato con parcheggio di fronte e a terra, giardino di 400 m² da condividere. Terrazza sul tetto disponibile con mobili da giardino e tavolo! Il tutto nel raggio di 1km dalla spiaggia! Ideale da solo, in coppia o per un viaggio professionale!',
                'user_id' => 4,
                'night_price' => 200,
                'n_beds' => 2,
                'n_rooms' => 1,
                'cover_img' => 'property_image/16/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 90,
                'visible' => 1,
                'address' => 'Corso Buenos Aires, 1 - Milano, Lombardia',
                'latitude' => 45.47519,
                'longitude' => 9.20552
            ],
            [	//17
                'title' => 'Splendido appartamento con vista mozzafiato sul mare',
                'description' => 'Superba F2 fronte mare completamente rinnovata a luglio 2021. Venite a godere di un cambiamento di scenario nel nostro appartamento Boulevard Sarrail a Palavas, sia che si tratti di vacanze o per una missione professionale, potrete godere di una vista magica e attrezzature complete in ogni stanza. Vicino al centro, di fronte al mare la ricetta ideale per un soggiorno perfetto.',
                'user_id' => 4,
                'night_price' => 400,
                'n_beds' => 4,
                'n_rooms' => 2,
                'cover_img' => 'property_image/17/cover_image.webp',
                'n_bathroom' => 2,
                'mq' => 120,
                'visible' => 1,
                'address' => 'Via Roma, 1 - Torino, Piemonte',
                'latitude' => 45.28774,
                'longitude' => 7.40433
            ],
            [	//18
                'title' => 'Splendida proprietà fronte mare con parcheggio',
                'description' => 'Sarò felice di accoglierti nel mio incantevole appartamento per 7 persone ad Arcachon (33120), al 4 ° piano di un palazzo con ascensore e posto auto.',
                'user_id' => 4,
                'night_price' => 600,
                'n_beds' => 6,
                'n_rooms' => 3,
                'cover_img' => 'property_image/18/cover_image.webp',
                'n_bathroom' => 3,
                'mq' => 200,
                'visible' => 1,
                'address' => 'Via dei Fori Imperiali, 1 - Roma, Lazio',
                'latitude' => 41.89338,
                'longitude' => 12.4869
            ],
            [	//19
                'title' => 'appartamento da sogno',
                'description' => 'Questo appartamento di circa 200 mq al piano terra è stato completamente ristrutturato nel 2021. L\'appartamento ha la posizione perfetta! A 5 minuti dalla fiera, accanto alla fiera, accesso al bosco dal giardino, a 5 minuti dal Maschsee e da altre destinazioni. Centrale e idilliaco allo stesso tempo. 4 persone possono dormire in 3 stanze. Camino, giardino privato con piscina, cucina aperta di lusso, XL cabina doccia, parquet o piastrelle di design in tutte le camere, spazio di lavoro nella nuova veranda... tutto il necessario! La piscina all\'aperto può essere aggiunta tra maggio e settembre. Verrà addebitato un costo giornaliero di 40€. La pulizia, il filtraggio e il riscaldamento sono inclusi (se consentito dalle autorità al momento del soggiorno). Da 4 notti è incluso un controllo intermedio in cui la piscina viene aspirata una volta e clorurata.',
                'user_id' => 4,
                'night_price' => 600,
                'n_beds' => 6,
                'n_rooms' => 3,
                'cover_img' => 'property_image/19/cover_image.webp',
                'n_bathroom' => 2,
                'mq' => 200,
                'visible' => 1,
                'address' => 'Via Veneto, 2 - Roma, Lazio',
                'latitude' => 41.7042,
                'longitude' => 12.69257
            ],
            [	//20
                'title' => 'attico aida',
                'description' => 'Vivete qui in posizione centrale, vicino alla STAZIONE CENTRALE, a tema moderno e amorevole per la crociera Aida nel monolocale attico superiore con vista unica sulla città e la zona della Ruhr. Un grande letto matrimoniale di lusso e un divano letto completamente allungabile consentono a un massimo di 4 adulti di soggiornare comodamente. Netflix, cucina, asciugamani, macchina Nespresso e un grande schermo piatto sono tutti parte della nostra attrezzatura di lusso.',
                'user_id' => 5,
                'night_price' => 300,
                'n_beds' => 3,
                'n_rooms' => 2,
                'cover_img' => 'property_image/20/cover_image.webp',
                'n_bathroom' => 2,
                'mq' => 110,
                'visible' => 1,
                'address' => 'Corso Italia, 1 - Sorrento, Campania',
                'latitude' => 40.6245,
                'longitude' => 14.36925
            ],
            [	//21
                'title' => 'casa vacanze in città',
                'description' => 'La casa vacanze si trova nel quartiere di HH-Horn vicino all\'ippodromo di Horner Galopp in un ampio giardino; 1 camera da letto e 1 soggiorno/camera da letto con dispensa cucina, 1 doccia/WC.',
                'user_id' => 5,
                'night_price' => 300,
                'n_beds' => 3,
                'n_rooms' => 2,
                'cover_img' => 'property_image/21/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 100,
                'visible' => 1,
                'address' => 'Via dei Calzaiuoli, 1 - Firenze, Toscana',
                'latitude' => 43.77067,
                'longitude' => 11.25521
            ],
            [	//22
                'title' => 'stanza privata in casa',
                'description' => 'vivi nella nostra casa in una camera ampia e accogliente con bagno privato con doccia e dormi in un comodo letto matrimoniale 1,80 x 2 m, vivi in un quartiere interessante con aspetti diversi, molto vicini ci sono i giardini del mondo, ma sei anche nel cuore della vita di Berlino a Warschauer Straße in 20 minuti, o in 30 minuti su Alexanderplatz, collegamento diretto in tram alla stazione ferroviaria principale, appartamento per non fumatori. Viviamo nel verde quartiere di Marzahn, a 15 chilometri dal centro città.',
                'user_id' => 5,
                'night_price' => 200,
                'n_beds' => 2,
                'n_rooms' => 1,
                'cover_img' => 'property_image/22/cover_image.webp',
                'n_bathroom' => 1,
                'mq' => 40,
                'visible' => 1,
                'address' => 'Corso Garibaldi, 1 - Brescia, Lombardia',
                'latitude' => 45.54066,
                'longitude' => 10.21567
            ],
            [	//23
                'title' => 'villa tropicana',
                'description' => 'Chiunque soggiorni con noi vivrà un\'atmosfera tropicale indimenticabile. Benvenuto in un luogo di riposo e relax.',
                'user_id' => 5,
                'night_price' => 600,
                'n_beds' => 6,
                'n_rooms' => 3,
                'cover_img' => 'property_image/23/cover_image.webp',
                'n_bathroom' => 2,
                'mq' => 150,
                'visible' => 1,
                'address' => 'Via Dante, 1 - Milano, Lombardia',
                'latitude' => 45.46517,
                'longitude' => 9.18614
            ]
        ];




        foreach($properties as $property){
            $newProperty = new Property();
            $newProperty->title = $property['title'];
            $newProperty->slug = Str::slug($newProperty->title);
            $newProperty->description = $property['description'];
            $newProperty->user_id = $property['user_id'];
            $newProperty->night_price = $property['night_price'];
            $newProperty->n_beds = $property['n_beds'];
            $newProperty->n_rooms = $property['n_rooms'];
            $newProperty->cover_img = $property['cover_img'];
            $newProperty->mq = $property['mq'];
            $newProperty->visible = $property['visible'];
            $newProperty->address = $property['address'];
            $newProperty->latitude = $property['latitude'];
            $newProperty->longitude = $property['longitude'];
            $newProperty->n_toilettes = $property['n_bathroom'];
            $newProperty->save();
            $newProperty->slug .="-$newProperty->id";
            $newProperty->update();
        }
    }
}
