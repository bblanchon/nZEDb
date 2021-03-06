<?php
//This script will update all records in the musicinfo table

define('FS_ROOT', realpath(dirname(__FILE__)));
require_once(FS_ROOT."/../../../www/config.php");
require_once(FS_ROOT."/../../../www/lib/framework/db.php");
require_once(FS_ROOT."/../../../www/lib/music.php");

$music = new Music(true);

$db = new Db();

$albums = results();
shuffle($albums);

foreach ($albums as $album) {
	$artist = $music->parseArtist($album);
	echo $artist['releasename'].'<br />';
	$result = $music->updateMusicInfo($artist['artist'], $artist['album'], $artist['year']);
	if ($result !== false) {
		echo '<pre>';
		print_r($result);
		echo '</pre><br /><br />';
	}
	die;
}


function results() {
	$str = 'Processing 260 music releases
Looking up: Disintegration [The Cure-Disintegration-3CD-Deluxe Edition-2010-EOS]
Looking up: Build And Destroy Euro Retail 2CD [Royce Da 59-Build And Destroy Euro Retail 2CD-2003-FTD]
Looking up: Dream Dance Vol 48 [VA - Dream Dance Vol 48-2CD-2011-QMI]
Looking up: Electro House Alarm Vol 8 [VA - Electro House Alarm Vol 8-2CD-2010-QMI]
Looking up: Om Himlen Och Osterlen [Danne Strahed-Om Himlen Och Osterlen-2CD-SE-2010-LoKET]
Looking up: Walk On Water Spacesynth Odyssey [Galaxy Hunter-Walk On Water Spacesynth Odyssey-(Rerip)-2CD-2010-BFHMP3]
Looking up: Ladies And Gentlemen [George Michael-Ladies And Gentlemen-2CD-1998]
Looking up: The Only Way To Know For Sure [Rollins Band-The Only Way To Know For Sure-2CD-2002-EOS]
Looking up:  [Crossroads Yearmix 2010-(BH DC 45-4)-WEB-2011-939]
Looking up: No. 9 [Handz Up For Trance - No. 9-(TITTYCOMP 031)-WEB-2011-939]
Looking up: WEB [Sexy Winter (Progressive House Edition)-WEB-2010-CBR]
Looking up: SE [Dansgladje 2-SE-2010-LoKET]
Looking up: One Word Extinguisher [Prefuse 73-One Word Extinguisher-ADVANCE-2003-ESC]
Looking up:  [Plusquam Deluxe II-(PQ242)-WEB-2010-CBR]
Looking up:  [Essentials Of 2010 (Progressive House Vol 3)-(GAM002)-WEB-2010-CBR]
Looking up: SE [Dansbandskampen 2010-SE-2010-LoKET]
Looking up: 2010 [DJ Promotion CD Pool Pop 140-2010-B2R]
Looking up: Bad Season [Tech N9ne-Bad Season (Hosted By DJ Whoo Kid And DJ Scream)-Bootleg-2010-FiH]
Looking up: Fons [Renaud Garcia-Fons--Mediterrannees-2010-OMA]
Looking up: Greatest Hits Quinndo Mania [San Quinn-Greatest Hits Quinndo Mania-2003-CR]
Looking up:  [Paris In The House Vol 1-(BLV136675)-WEB-2010-CBR]
Looking up: Welcome Home Vol. 1 [Shawn Pen (Of G-Unit)-Welcome Home Vol. 1-2004-C4]
Looking up: The Chronic 2010 [Wiz Khalifa-The Chronic 2010-Bootleg-2010-FiH]
Looking up: 2010 [DJ Promotion CD Pool Black 90-2010-B2R]
Looking up: Digital Bullet [RZA As Bobby Digital-Digital Bullet-Ltd.Ed.-2001-CMS]
Looking up: 2010 [DJ Promotion CD Pool Pop 139-2010-B2R]
Looking up: Christmas with [Boney M-Christmas with-2007-BnL]
Looking up: Cold Roses [Ryan Adams-Cold Roses-2CD-Retail-2005-XXL]
Looking up: The Social Network [Trent Reznor And Atticus Ross-The Social Network-OST-2010-EOS]
Looking up: Omerta [Slick Pulla-Omerta (The Code Of Silence)-(Bootleg)-2008-RAGEMP3]
Looking up: PL [DJ Promotion CD Pool Polska 51-PL-2010-B2RPL]
Looking up: Authorized Greatest Hits [Cheap Trick-Authorized Greatest Hits-2000-SER]
Looking up: Money And Muscle [Skiem Hiem And Killa Tay-Money And Muscle-From Cali To KC V.1-2009-CR]
Looking up: 2007 [Sen Dog Presents Fat Joints Volume 1-2007-TQM]
Looking up: Reggae Evolution [Richie Stephens-Reggae Evolution-2010-H3X]
Looking up: 2008 [Bacc On Tha Briccs-2008-CR]
Looking up: 2010 [Radioplay Dance Express 902D-2010-SC]
Looking up: Foundation [Breakage-Foundation-(SBOYCD002)-CD-2010-hM]
Looking up: Hooked [Great White-Hooked-Remastered-(JP Edition)-2005]
Looking up:  [Black Album-(Advance)-FR-2002-0MNi]
Looking up:  [New School-(Bootleg)-FR-2011-H5N1]
Looking up: 1997 [Next Rated (Explicit Retail)-1997-OSM]
Looking up:  [Shiny Gnomes--Cowboys Of Peace Live 2002-2003-UBE]
Looking up:  [George Hennig--Ghosts-2011-OMA]
Looking up: Turf Monopoly [Skiem and Rappin Twan-Turf Monopoly-2008-CR]
Looking up: 2010 [Dystopia Lane-2010-OMA]
Looking up: 2010 [Radioplay Urban Express 902Y-2010-SC]
Looking up: Fuck Dat Fm [Fuck Dat-Fuck Dat Fm-Retail-FR-2004-HMC]
Looking up: CHRistopher [Sleep (Of Old Dominion)-CHRistopher-2005-C4]
Looking up: Tha Londonero [Nono Brown-Tha Londonero-2011-CR]
Looking up: The Ripgut Collection [Brotha Lynch Hung-The Ripgut Collection-2007-CR]
Looking up: Emergency Broadcast System [E.B.S-Emergency Broadcast System-(CDBZ11)-WEB-2009-KOUALA]
Looking up: Neva Knock Da Hustle [Ruff Side Playaz-Neva Knock Da Hustle-2002-RAGEMP3]
Looking up: The Waiting Room [Os Modernistas-The Waiting Room-2010-WHOA]
Looking up: Based On A True Story [Skinny Pimp And The Committee-Based On A True Story-2003-WCR]
Looking up: Steel Magnolia [Steel Magnolia-Steel Magnolia-2011-CR]
Looking up: 2010 [Ten Years Ago-2010-BFHMP3]
Looking up: Broadcast [Cutting Crew-Broadcast-Remastered-2010-GRAVEWISH]
Looking up:  [The Mist of Avalon--Dinya-2010-OMA]
Looking up: Hell City Glamours [Hell City Glamours-Hell City Glamours-2008-OZM]
Looking up: FR [Brut De Femme-FR-2003-MVP]
Looking up: Reissue [Kill Depression-Reissue-PL-2007-B2RPL]
Looking up: Thank You Happy Birthday [Cage The Elephant-Thank You Happy Birthday-2011-CR]
Looking up: Retail [The Very Best of Supertramp-Retail-2001]
Looking up: 2000 [Crouching Tiger Hidden Dragon OST-2000]
Looking up: Bound to Ravage [Diamond Dogs-Bound to Ravage-2005-BFS]
Looking up: 2010 [Full Circle-2010-FiH]
Looking up: 2010 [DJ Promotion CD Pool House Mixes 263-2010-B2R]
Looking up: Pebble [Lemuria-Pebble-2011-FNT]
Looking up: Fresh Fruit For Rotting Vegetables [Dead Kennedys-Fresh Fruit For Rotting Vegetables-Remastered-2002-PoS]
Looking up: Mixes 257 [DJ Promotion CD Pool Tech-Mixes 257-2010-B2R]
Looking up:  [Alter Ego Winter Elements-(AEDWE01MP3)-WEB-2010-CBR]
Looking up: READ NFO [Tech House Vol. 2-READ NFO-2010-WHOA]
Looking up: Mixes 257 [DJ Promotion CD Pool Tech-Mixes 257-2010-R2R]
Looking up: Lyfe 268 192 [Lyfe Jennings-Lyfe 268 192-(Retail)-2004-C4]
Looking up: Madin Extension [Gilles Rosine-Madin Extension-2010-ETHNiC]
Looking up: Lyfe Change [Lyfe Jennings-Lyfe Change-2008-WHOA]
Looking up: Jacksonville City Nights [Ryan Adams-Jacksonville City Nights-(German Retail)-2005-EGO]
Looking up: Mixes 259 [DJ Promotion CD Pool Tech-Mixes 259-2010-B2R]
Looking up: Mixes 259 [DJ Promotion CD Pool Tech-Mixes 259-2010-R2R]
Looking up: 2010 [WWE The Music Vol 10 A New Day-2010-EOS]
Looking up: 2010 [Death Coven-2010-FiH]
Looking up: Odessa [Odessa-Odessa-2010-JUST]
Looking up: Stardust   the Great American Songbook Vol. III [Rod Stewart-Stardust   the Great American Songbook Vol. III-2004-XXL]
Looking up: 2010 [DJ Promotion CD Pool House Mixes 264-2010-B2R]
Looking up: Mixes 258 [DJ Promotion CD Pool Tech-Mixes 258-2010-B2R]
Looking up: 2010 [DJ Promotion CD Pool House Mixes 262-2010-B2R]
Looking up: Mixes 258 [DJ Promotion CD Pool Tech-Mixes 258-2010-R2R]
Looking up: DE [Dick In Frisco-DE-2007-UBE]
Looking up: Cosmos [The Send-Cosmos-2007-FNT]
Looking up: It Doesnt Matter [The Underdog Project - It Doesnt Matter-CD-2003-KTMP3]
Looking up: Wonderland [Sea Of Treachery-Wonderland-2010-KzT]
Looking up: Laundry Service [Shakira - Laundry Service-2001-ESK]
Looking up: ATB The DJ 2 In The Mix [VA - ATB The DJ 2 In The Mix-2CD-2004-MOD]
Looking up:  [Best Of Get Physical 2010-(GPMDA037)-WEB-2010-SiBERiA]
Looking up: Hamaja [Camino - Hamaja-1994-L2M]
Looking up: 2008 [Forever Ripping Fast-2008-BERC]
Looking up: Sophisticated Abstractions [Saeg - Sophisticated Abstractions-2011-MYCEL]
Looking up: Demolition [Ryan Adams-Demolition-Advance-2002-ESC]
Looking up: Green Volume [Different Beat - Green Volume-(BL117882)-WEB-2011-939]
Looking up: 1998 [ECW Extreme Music-1998-EOS]
Looking up: 2009 [WWE The Music Vol 9 Voices-2009-EOS]
Looking up: Inspiration Information [Shuggie Otis-Inspiration Information (Remastered)-2001-EGO]
Looking up: Cosmic Catastrophe [Zeno And The Stoics-Cosmic Catastrophe-2010-SSR]
Looking up:  [Inspiring Deeper House Music (Deejayfriendly Sampler)-(WER101212)-WEB-2010-CBR]
Looking up: Gravity [Westlife-Gravity-2010-pLAN9]
Looking up: Black River Road [Diamond Dogs-Black River Road-2004]
Looking up:  [Spuugdingen Op De Mic-(INTERNAL)-NL-2001-PTD]
Looking up: Tip [Q-Tip-Amplified-1999-EGO]
Looking up: Colours Of Turner [Jacques Stotzem And Andre Klenes - Colours Of Turner-2006-L2M]
Looking up: Beat [Bowery Electric - Beat-1994-FERiCEx]
Looking up: Up The Rock [Diamond Dogs-Up The Rock-2006-EGO]
Looking up: Polyhymnia [Leenuz - Polyhymnia-2011-MYCEL]
Looking up: 2003 [Skin On Fire-2003-EOS]
Looking up: 2011 [Showroom Of Compassion-2011-FNT]
Looking up: Leviathan Destroyer [Amen Corner-Leviathan Destroyer-2010-BERC]
Looking up: 2010 [Mainlining The Lugubrious-2010-FiH]
Looking up:  [Treacle Live-(CDBZ03)-WEB-2006-KOUALA]
Looking up: Improvised Electronic Device [Front Line Assembly-Improvised Electronic Device-2010-EOS]
Looking up: EP2 [Yale67  Blue Ketchuppp-EP2-(BZ02)-WEB-2003-KOUALA]
Looking up: Liquid [Recoil-Liquid-2000-EOS]
Looking up: EP1 [lel  Private Eye-EP1-(BZ01)-WEB-2002-KOUALA]
Looking up: 1989 Edinburgh Skyline nmrVBR [Robin Laing - 1989 Edinburgh Skyline nmrVBR -apex]
Looking up: Sol I [Helrunar - Sol I - Der Dorn Im Nebel-DE-2011-CRUELTY]
Looking up:  [Robots Cry Too-(PPR032DL)-WEB-2011-939]
Looking up: Ystavyys Friendship [Sister Flo-Ystavyys Friendship-WEB-2010-KALEVALA]
Looking up: P Aa Opal Poere Pr.33 [Velvet Cacoon-P Aa Opal Poere Pr.33-2x10inch-Vinyl-2010-hXc]
Looking up: Crazy [Im Not A Band - Crazy-WEB-2010-RAiN]
Looking up: 2010 [Doctrine Of Lies-2010-FiH]
Looking up: 2006 [Inner Twist-2006-EOS]
Looking up: Sol II [Helrunar - Sol II - Zweige Der Erinnerung-DE-2011-CRUELTY]
Looking up: CDM [Storm Of Impermanence-CDM-2005-EOS]
Looking up: Thats The Way The Cookie Crum [Miso Soup-Thats The Way The Cookie Crum-(CDBZ18)-WEB-2010-KOUALA]
Looking up: Angriff [Front Line Assembly-Angriff (Remix)-Limited Edition EP-2010-EOS]
Looking up: Dont Break It [Subject Delta vs. 5 Sided Cube-Dont Break It-(A10022606)-WEB-2011-939]
Looking up: Western Vacation [Steve Vai-Western Vacation-Remastered-2010-CFD]
Looking up: Digital Revolution [The Element-Digital Revolution-(PPR035DL)-WEB-2011-939]
Looking up: Cause And Effect [Anderson T-Cause And Effect-WEB-2011-EDML]
Looking up: Reach For The Lazers [Andy Murphy-Reach For The Lazers-(SNEAK197)-WEB-2011-HFT]
Looking up: Catching A Killer [Red Ink-Catching A Killer-EP-2010-OZM]
Looking up: My Salvation [Future Keys-My Salvation-(MIE8014090063328)-WEB-2011-HFT]
Looking up:  [Maybe The Last-(CDBZ14)-WEB-2010-KOUALA]
Looking up: Just A Dream [Play and Hype Jones-Just A Dream-(SP244)-WEB-2011-HFT]
Looking up: El Porro [Lazardi and Electronic Drums-El Porro-(SPDEEP058)-WEB-2011-HFT]
Looking up: Married Robots [Microcheep and Mollo-Married Robots-(DK040)-WEB-2010-CBR]
Looking up: Check The Ladies [Onikz and KTX - Check The Ladies-(LOR018)-WEB-2011-SOB]
Looking up: Rise Up 2011 [Dik Lewis feat Danna Leese-Rise Up 2011-WEB-2010-CBR]
Looking up: Bloodline [Recoil-Bloodline-1992-EOS]
Looking up: Nuits [Phasme-Nuits-(CDBZ06)-WEB-2007-KOUALA]
Looking up: 1993 Fiona nmrVBR [Patrick Ball - 1993 Fiona nmrVBR -apex]
Looking up: CDM [Faith Healer-CDM-1992-EOS]
Looking up: Your Mind  New Moon [Tim Richards-Your Mind  New Moon-(CUBISM040)-WEB-2010-CBR]
Looking up: Thats Why [Jorgensen and Patric La Funk-Thats Why-(FACTO052)-WEB-2011-HFT]
Looking up: South I Heat [Ruff Side Playaz-South I Heat-2002-RAGEMP3]
Looking up: DJ Networx Vol 47 [VA - DJ Networx Vol 47-2CD-2011-QMI]
Looking up: Concertos And Romance [Janine Jansen-Concertos And Romance-2006-gnvr]
Looking up: Vorprogrammiert [Charity - Vorprogrammiert-(TB080)-WEB-DE-2010-DJ]
Looking up: Luis Matinier [David Friedman, Anthony Cox, Jean-Luis Matinier - 1997 Other Worlds nmrVBR -apex]
Looking up: Lucky J Vol.2 [Mark Henning-Lucky J Vol.2-WEB-2011-939]
Looking up: Ripples [Phillipo Blake-Ripples-(ARR015)-WEB-2011-939]
Looking up: WEB [Insert Title Here-WEB-2011-USF]
Looking up:  [Firing For Effects-(BZ04)-WEB-2006-KOUALA]
Looking up: La Torta Dello Zio [Johnny Kaos-La Torta Dello Zio-(AMAZINGH011)-WEB-2010-CBR]
Looking up: WEB [Black Side The Remixes-WEB-2010-USF]
Looking up: Im Not A Band [Im Not A Band - Im Not A Band-WEB-2010-RAiN]
Looking up: Catalunya [Sean Collier-Catalunya-(CUBISM041)-WEB-2010-CBR]
Looking up:  [Aint Got No-(HLF001)-WEB-2010-CBR]
Looking up: Together Remixes [Ted Dettman-Together Remixes-(FHD148)-WEB-2010-CBR]
Looking up: EP [Satanic Inquisition-EP-FR-2010-FiH]
Looking up: The Dark Knight [Mr Gil and Marcelo Carvalho-The Dark Knight-(RRR0438)-WEB-2010-CBR]
Looking up: CDM [Ohne Dich-CDM-2004-EOS]
Looking up: 2010 Stranger I nmrVBR [Move D & Pete Namlook - 2010 Stranger I nmrVBR -apex]
Looking up: 1988 [Hydrology Plus 1 And 2-1988-EOS]
Looking up: Ninja Pants [Tone Depth and Anthony Attalla-Ninja Pants-(INC030)-WEB-2010-CBR]
Looking up: CDM [Asche Zu Asche-CDM-2001-EOS]
Looking up: Spring Rain [Rich Jones-Spring Rain-(PM049)-WEB-2011-939]
Looking up:  [Diving EP-(RBITESDIGITAL020)-WEB-2011-BPM]
Looking up: On The Move  Roll The Dice [Benny Knox-On The Move  Roll The Dice-WEB-2010-CBR]
Looking up: Way Back [Marcello Matrixx-Way Back-(MDS009)-WEB-2010-CBR]
Looking up:  [Wriggle  Glupper-(EYE013)-WEB-2010-CBR]
Looking up: Break The Rules [Jamie Walker - Break The Rules-EP-(DEF015)-WEB-2011-SRG]
Looking up:  [Diablo Rojo-(PDE0039)-WEB-2010-CBR]
Looking up:  [Dojoo  Bambino-(PLM008)-WEB-2010-CBR]
Looking up:  [Stand Clear Of The Closing Doors-(KOTE1026)-WEB-2010-CBR]
Looking up: Attention [Ellesse and Antonio Piacquadio-Attention-(INM007)-WEB-2010-CBR]
Looking up: Tequila [Plasticine Rulers-Tequila-(STR025)-WEB-2010-CBR]
Looking up: Transitions [John Digweed - Transitions-SAT-01-01-2011-EXD]
Looking up: WEB [Jack Is Dirty  Jack Is Jack-WEB-2010-CBR]
Looking up: AIRea [Theo-AIRea-SAT-06-01-2011-1KING]
Looking up: To The Club [Ranucci and Pelusi-To The Club-SAT-06-01-2011-LFA]
Looking up: Kiss100 [Sinden - Kiss100-SAT-01-06-2011-TALiON]
Looking up: Featured Artist [Victor Slate - Featured Artist (Proton Radio)-SBD-01-05-2011]
Looking up: A State of Trance 2010 Yearmix [Armin Van Buuren - A State of Trance 2010 Yearmix-SAT-01-01-2011-EXD]
Looking up: Kings [Sharon Jones and The Dap-Kings-Nancy Jazz Pulsations-DVBS-2010-JUST]
Looking up: Sonne [Rammstein-Sonne-CDM-2001-EOS]
Looking up: Chasin The Groove [Chase Buch-Chasin The Groove-(KOTE1027)-WEB-2010-CBR]
Looking up: CD [Ravestorm Hardcore Winter Edition-CD-2010-hM]
Looking up: Helios [Andy Allder-Helios-(DDR004)-WEB-2010-CBR]
Looking up: FG DJ Live [Jean Jerome-FG DJ Live-05-01-SAT-2011-TDMLiVE]
Looking up:  [Spaceman Spiff--Live in Hamburg-DE-DVBS-09-01-2010-OMA]
Looking up: Beach House [Matthias Maxwell-Beach House-(BPM012)-WEB-2010-CBR]
Looking up: CD [Ravestorm Hardcore Winter Edition-CD-2010MhM]
Looking up: Drumcode 022 [Adam Beyer-Drumcode 022-SAT-05-01-2011-1KING]
Looking up: The Last Time [Abstract Vision and Elite Electronic-The Last Time-LEVARE029-WEB-2011-TraX]
Looking up: Back To The Earth [The Kids-Back To The Earth-(CDRL029)-WEB-2011-939]
Looking up: Proton GT [Dual Shaman - Proton GT (Proton Radio)-SBD-01-05-2011]
Looking up: Eclipse [Alex Whitcombe and Simon Duffy-Eclipse-(SFR010)-WEB-2010-CBR]
Looking up: Dont Cry For My Love [Dirty Nights-Dont Cry For My Love-(BLV130698)-WEB-2010-CBR]
Looking up: Trance Evolution Highlights [Giuseppe Ottaviani-Trance Evolution Highlights-SAT-05-01-2011-LFA]
Looking up: Winter [Tori Amos-Winter-CDM-1992-EOS]
Looking up: Club Tales [Jefr Tale-Club Tales-SAT-05-01-2011-1KING]
Looking up: Trance Evolution [Andrea Mazza-Trance Evolution-SAT-04-01-2011-LFA]
Looking up: Group Dynamics [Randall Jones - Group Dynamics (Proton Radio)-SBD-01-05-2011]
Looking up: Warewolf [Al Storm-Warewolf (Make Me Bark VIP Mix)-WEB-2011-EDML]
Looking up: BBC Radio1 [Gilles Peterson - BBC Radio1-SAT-01-04-2011-EXD]
Looking up: Special Mix 4 Klub FM [Graham Sahara-Special Mix 4 Klub FM-(Planeta.Fm)-05-01-SBD-2011-TDMLiVE]
Looking up: Mix Session [DJ Frank Aka NBG - Mix Session (Topradio)-DVBC-14-11-2010-HB]
Looking up: Magnitude [Francesco Pico - Magnitude (Proton Radio)-SBD-01-05-2011]
Looking up: Destiny [DJ Seduction-Destiny (Feat Malaya)-WEB-2011-EDML]
Looking up: SoulCooking [Massimiliano Troiani-SoulCooking-SAT-05-01-2011-LFA]
Looking up: Soundzrise [Francesco Pierguidi-Soundzrise-SAT-06-01-2011-LFA]
Looking up: Fable [W4cko And Alpha Protocol - Fable-(SUBSONIC033)-WEB-2011-SRG]
Looking up: Speaker Syrup [Jennifer Tutty - Speaker Syrup (Proton Radio)-SBD-01-05-2011]
Looking up: Reality [DJanny-Reality-(RIPRECD011)-WEB-2011-BPM]
Looking up: Soundzrise [Onirika-Soundzrise-SAT-05-01-2011-LFA]
Looking up:  [Mix Session-(Contact)-06-01-SAT-2011-TDMLiVE]
Looking up: Omega [Rohann-Omega-(SXM10)-WEB-2010-CBR]
Looking up: Flipside at Five [DJ Flipside-Flipside at Five (96.3FM)-DAB-05-01-2011-1KING]
Looking up: Stardust [Paolo Bolognesi-Stardust-SAT-04-01-2011-LFA]
Looking up: Automatic Static [DJ Icey-Automatic Static-SAT-05-01-2011-1KING]
Looking up: Noice [P.Toile - Noice (Proton Radio)-SBD-01-05-2011]
Looking up: Live on Radio 1 [Kissy Sell Out-Live on Radio 1-CABLE-01-06-2011-uC]
Looking up: Warm Art [Rob Dowell - Warm Art (Proton Radio)-SBD-01-05-2011]
Looking up: Etoka Sessions [Artette - Etoka Sessions (Proton Radio)-SBD-01-05-2011]
Looking up: China [Tori Amos-China-CDM-1992-EOS]
Looking up: Proton GT [Da Syk - Proton GT (Proton Radio)-SBD-01-05-2011]
Looking up: Mutter [Rammstein-Mutter-CDM-2002-EOS]
Looking up: Kiss100 [DJ Hype - Kiss100-SAT-01-06-2011-TALiON]
Looking up: God [Tori Amos-God-CDM-1994-EOS]
Looking up: To The Club [Alessandro Viale-To The Club-SAT-06-01-2011-LFA]
Looking up: Group Dynamics [Dandy - Group Dynamics (Proton Radio)-SBD-01-05-2011]
Looking up: Live at Day One [Felix Kroecher - Live at Day One (Madrid)-SAT-01-01-2011-TALiON]
Looking up: Trance Evolution [Andrea Mazza-Trance Evolution-SAT-05-01-2011-LFA]
Looking up: Mix Session [DJ Frank Aka NBG - Mix Session (Topradio)-DVBC-21-11-2010-HB]
Looking up: SoulCooking [Massimiliano Troiani-SoulCooking-SAT-06-01-2011-LFA]
Looking up:  [Lova Mig Sjalv-(TrackFix)-SE-2010-LoKET]
Looking up: Noice [Till Von Sein - Noice (Proton Radio)-SBD-01-05-2011]
Looking up: Rosenrot [Rammstein-Rosenrot-CDM-2005-EOS]
Looking up: Soundzrise [Miss Babayaga-Soundzrise-SAT-06-01-2011-LFA]
Looking up: CDM [Smells Like Teen Spirit-CDM-1991]
Looking up: Stardust [Paolo Bolognesi-Stardust-SAT-05-01-2011-LFA]
Looking up: Corstens Countdown 184 [Ferry Corsten - Corstens Countdown 184-SAT-01-05-2011-TALiON]
Looking up: Walk The Dinosaur [Was Not Was-Walk The Dinosaur-Vinyl-1987]
Looking up: Shifting Through The Lens [Front Line Assembly-Shifting Through The Lens-CDS-2010-EOS]
Looking up: CDM [Missing Piece-CDM-1998-EOS]
Looking up: Another Line Another Page [Through The Wishing Well-Another Line Another Page-(EP)-2008-FM]
Looking up: Jackies Strength [Tori Amos-Jackies Strength-CDS-1998-EOS]
Looking up: Pussy [Rammstein-Pussy-CDS-2009-EOS]
Looking up: La diarrh�e contestataire [DadA - La diarrh�e contestataire]
Looking up: Patch.v0.2 [DVDFab.v8.0.6.8.Final.Incl.PROPER.Multi-Patch.v0.2-BBB]
';
	preg_match_all('/\[(.*?)\]/', $str, $matches);
	//print_r($matches);
	return $matches[1];
}

?>
