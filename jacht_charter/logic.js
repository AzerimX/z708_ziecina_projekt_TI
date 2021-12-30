//alert("k");

/*
$('#reservation_form').submit(function () {
	alert("yay?");
 return false;
});
*/

function form_check()
{
	alert("yay?");
}

function jacht_clicked(jacht)
{
	var text_to_display = "";
	switch(jacht)
	{
		// 1
		case "Twister 800N":
			text_to_display =
				"<h2>Twister 800N</h2> \
				<img src='twister_800n.jpg' height='300px'>\
				<p>Jacht Twister 800n to konstrukcja turystyczna, ale z mocnym zacięciem regatowym. Jacht szybki, bardzo łatwo wchodzi w przechył, ale trzyma go i nie pogłębia przy naprawdę silnym wietrze. Dostarcza wobec tego wrażeń amatorom „jazdy na kancie”. <\p>\
				"
				;
			break;
		// 2
		case "Focus 730":
			text_to_display =
				"<h2>Focus 730</h2> \
				<img src='focus_730.jpg' height='300px'>\
				<p>Dzięki podniesieniu wolnej burty, niewielkiemu backdeckowi i łukowato wygiętej nadbudówce uzyskano wysokość pozwalającą swobodnie oprzeć się o burtę bez obaw o uderzenie głową o półpokład. Nie ucierpiała na tym bryła kadłuba i pokładu, której konstruktor Jerzy Pieśniewski nadał dynamiczny, harmonijny design. <\p>\
				"
				;
			break;
		// 3
		case "Maxus 33":
			text_to_display =
				"<h2>Maxus 33</h2> \
				<img src='maxus_33.jpg' height='300px'>\
				<p>Maxus 33 projektu Jacka Daszkiewicza jest pierwszą konstrukcją stoczni Northman. Jacht podczas swojej premiery na Boatshow 2007 zdobył Złoty Medal Targów. W pierwszym sezonie sprzedaży Maxus 33 spotkał się z bardzo dobrym odbiorem zarówno klientów czarterowych jak i armatorów indywidualnych, a testy na wodzie potwierdziły jego korzystne właściwości nautyczne. <\p>\
				"
				;
			break;
		// 4
		case "Bavaria 46":
			text_to_display =
				"<h2>Bavaria 46</h2> \
				<img src='bavaria_46.jpg' height='300px'>\
				<p>Duży jacht żaglowy Bavaria 46 Cruiser Praslin do czarteru z bazy Majorka, Palma - La Lonja Marina – Hiszpania. Ten czterokabinowy jacht zabiera na pokład 9 osób. Wyprodukowany w 2005 roku. Długość jachtu 14.20 m. <\p>\
				"
				;
			break;
		// 5
		case "Bavaria 36":
			text_to_display =
				"<h2>Bavaria 36</h2> \
				<img src='bavaria_36.jpg' height='300px'>\
				<p>Kompaktowy jacht żaglowy Bavaria 36 Cruiser Estela. Czarter jachtu z bazy Biograd - Marina Kornati – Chorwacja. Ten trzykabinowy jacht zabiera na pokład 8 osób. Wyprodukowany w 2012 roku. Nieduży jacht o długości 11.30 m. <\p>\
				"
				;
			break;
		// 6
		case "Lagoon 39":
			text_to_display =
				"<h2>Lagoon 39</h2> \
				<img src='lagoon_39.jpg' height='300px'>\
				<p>Jest to duża luksusowa jednostka z mnóstwem miejsca i przestrzeni, bardzo stabilna i bezpieczna. Dwa salony połączone barkiem świetnie nadają się do biesiadowania całej załogi, a duży pokład wraz z siatką i podwyższonym dachem idealnie sprawdza się do opalania i podziwiania zmieniającego się krajobrazu. <\p>\
				"
				;
			break;
		// def
		default:
			text_to_display = "";
	}
	// switch ended
	// 
	// TERAZ FUNKCJA DODAJĄCA FORMULARZ
	
	text_to_display += 
	`
		<h3><a href="kontakt.php">Zarezerwuj już teraz!</a></h3>
	`
	;
	document.getElementById("content_box").innerHTML = text_to_display;
	
} 

function display_jacht(jacht_model)
{
	document.getElementById("content_box").innerHTML = "kkk <3";
}
