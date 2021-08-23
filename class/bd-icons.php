﻿CREATE TABLE IF NOT EXISTS icons (
id int(10) unsigned NOT NULL AUTO_INCREMENT,
dc datetime DEFAULT NULL COMMENT 'data cadastrado',
da datetime DEFAULT NULL COMMENT 'data alterado',
tipo varchar(255) DEFAULT NULL COMMENT 'tipo: fa,fas,far,fab,fal',
fa varchar(255) DEFAULT NULL COMMENT 'nome',
content varchar(255) DEFAULT NULL COMMENT 'tag',
PRIMARY KEY (id),
KEY dc (dc),
KEY da (da)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Awesome Icons';

insert into icons (fa,content) VALUES
('fa-500px','"\f26e"'),
('fa-accessible-icon','"\f368"'),
('fa-accusoft','"\f369"'),
('fa-address-book','"\f2b9"'),
('fa-address-card','"\f2bb"'),
('fa-adjust','"\f042"'),
('fa-adn','"\f170"'),
('fa-adversal','"\f36a"'),
('fa-affiliatetheme','"\f36b"'),
('fa-alarm-clock','"\f34e"'),
('fa-algolia','"\f36c"'),
('fa-align-center','"\f037"'),
('fa-align-justify','"\f039"'),
('fa-align-left','"\f036"'),
('fa-align-right','"\f038"'),
('fa-allergies','"\f461"'),
('fa-amazon','"\f270"'),
('fa-amazon-pay','"\f42c"'),
('fa-ambulance','"\f0f9"'),
('fa-american-sign-language-interpreting','"\f2a3"'),
('fa-amilia','"\f36d"'),
('fa-anchor','"\f13d"'),
('fa-android','"\f17b"'),
('fa-angellist','"\f209"'),
('fa-angle-double-down','"\f103"'),
('fa-angle-double-left','"\f100"'),
('fa-angle-double-right','"\f101"'),
('fa-angle-double-up','"\f102"'),
('fa-angle-down','"\f107"'),
('fa-angle-left','"\f104"'),
('fa-angle-right','"\f105"'),
('fa-angle-up','"\f106"'),
('fa-angry','"\f556"'),
('fa-angrycreative','"\f36e"'),
('fa-angular','"\f420"'),
('fa-app-store','"\f36f"'),
('fa-app-store-ios','"\f370"'),
('fa-apper','"\f371"'),
('fa-apple','"\f179"'),
('fa-apple-pay','"\f415"'),
('fa-archive','"\f187"'),
('fa-archway','"\f557"'),
('fa-arrow-alt-circle-down','"\f358"'),
('fa-arrow-alt-circle-left','"\f359"'),
('fa-arrow-alt-circle-right','"\f35a"'),
('fa-arrow-alt-circle-up','"\f35b"'),
('fa-arrow-alt-down','"\f354"'),
('fa-arrow-alt-from-bottom','"\f346"'),
('fa-arrow-alt-from-left','"\f347"'),
('fa-arrow-alt-from-right','"\f348"'),
('fa-arrow-alt-from-top','"\f349"'),
('fa-arrow-alt-left','"\f355"'),
('fa-arrow-alt-right','"\f356"'),
('fa-arrow-alt-square-down','"\f350"'),
('fa-arrow-alt-square-left','"\f351"'),
('fa-arrow-alt-square-right','"\f352"'),
('fa-arrow-alt-square-up','"\f353"'),
('fa-arrow-alt-to-bottom','"\f34a"'),
('fa-arrow-alt-to-left','"\f34b"'),
('fa-arrow-alt-to-right','"\f34c"'),
('fa-arrow-alt-to-top','"\f34d"'),
('fa-arrow-alt-up','"\f357"'),
('fa-arrow-circle-down','"\f0ab"'),
('fa-arrow-circle-left','"\f0a8"'),
('fa-arrow-circle-right','"\f0a9"'),
('fa-arrow-circle-up','"\f0aa"'),
('fa-arrow-down','"\f063"'),
('fa-arrow-from-bottom','"\f342"'),
('fa-arrow-from-left','"\f343"'),
('fa-arrow-from-right','"\f344"'),
('fa-arrow-from-top','"\f345"'),
('fa-arrow-left','"\f060"'),
('fa-arrow-right','"\f061"'),
('fa-arrow-square-down','"\f339"'),
('fa-arrow-square-left','"\f33a"'),
('fa-arrow-square-right','"\f33b"'),
('fa-arrow-square-up','"\f33c"'),
('fa-arrow-to-bottom','"\f33d"'),
('fa-arrow-to-left','"\f33e"'),
('fa-arrow-to-right','"\f340"'),
('fa-arrow-to-top','"\f341"'),
('fa-arrow-up','"\f062"'),
('fa-arrows','"\f047"'),
('fa-arrows-alt','"\f0b2"'),
('fa-arrows-alt-h','"\f337"'),
('fa-arrows-alt-v','"\f338"'),
('fa-arrows-h','"\f07e"'),
('fa-arrows-v','"\f07d"'),
('fa-assistive-listening-systems','"\f2a2"'),
('fa-asterisk','"\f069"'),
('fa-asymmetrik','"\f372"'),
('fa-at','"\f1fa"'),
('fa-atlas','"\f558"'),
('fa-audible','"\f373"'),
('fa-audio-description','"\f29e"'),
('fa-autoprefixer','"\f41c"'),
('fa-avianex','"\f374"'),
('fa-aviato','"\f421"'),
('fa-award','"\f559"'),
('fa-aws','"\f375"'),
('fa-backspace','"\f55a"'),
('fa-backward','"\f04a"'),
('fa-badge','"\f335"'),
('fa-badge-check','"\f336"'),
('fa-balance-scale','"\f24e"'),
('fa-balance-scale-left','"\f515"'),
('fa-balance-scale-right','"\f516"'),
('fa-ban','"\f05e"'),
('fa-band-aid','"\f462"'),
('fa-bandcamp','"\f2d5"'),
('fa-barcode','"\f02a"'),
('fa-barcode-alt','"\f463"'),
('fa-barcode-read','"\f464"'),
('fa-barcode-scan','"\f465"'),
('fa-bars','"\f0c9"'),
('fa-baseball','"\f432"'),
('fa-baseball-ball','"\f433"'),
('fa-basketball-ball','"\f434"'),
('fa-basketball-hoop','"\f435"'),
('fa-bath','"\f2cd"'),
('fa-battery-bolt','"\f376"'),
('fa-battery-empty','"\f244"'),
('fa-battery-full','"\f240"'),
('fa-battery-half','"\f242"'),
('fa-battery-quarter','"\f243"'),
('fa-battery-slash','"\f377"'),
('fa-battery-three-quarters','"\f241"'),
('fa-bed','"\f236"'),
('fa-beer','"\f0fc"'),
('fa-behance','"\f1b4"'),
('fa-behance-square','"\f1b5"'),
('fa-bell','"\f0f3"'),
('fa-bell-slash','"\f1f6"'),
('fa-bezier-curve','"\f55b"'),
('fa-bicycle','"\f206"'),
('fa-bimobject','"\f378"'),
('fa-binoculars','"\f1e5"'),
('fa-birthday-cake','"\f1fd"'),
('fa-bitbucket','"\f171"'),
('fa-bitcoin','"\f379"'),
('fa-bity','"\f37a"'),
('fa-black-tie','"\f27e"'),
('fa-blackberry','"\f37b"'),
('fa-blanket','"\f498"'),
('fa-blender','"\f517"'),
('fa-blind','"\f29d"'),
('fa-blogger','"\f37c"'),
('fa-blogger-b','"\f37d"'),
('fa-bluetooth','"\f293"'),
('fa-bluetooth-b','"\f294"'),
('fa-bold','"\f032"'),
('fa-bolt','"\f0e7"'),
('fa-bomb','"\f1e2"'),
('fa-bong','"\f55c"'),
('fa-book','"\f02d"'),
('fa-book-heart','"\f499"'),
('fa-book-open','"\f518"'),
('fa-bookmark','"\f02e"'),
('fa-bowling-ball','"\f436"'),
('fa-bowling-pins','"\f437"'),
('fa-box','"\f466"'),
('fa-box-alt','"\f49a"'),
('fa-box-check','"\f467"'),
('fa-box-fragile','"\f49b"'),
('fa-box-full','"\f49c"'),
('fa-box-heart','"\f49d"'),
('fa-box-open','"\f49e"'),
('fa-box-up','"\f49f"'),
('fa-box-usd','"\f4a0"'),
('fa-boxes','"\f468"'),
('fa-boxes-alt','"\f4a1"'),
('fa-boxing-glove','"\f438"'),
('fa-braille','"\f2a1"'),
('fa-briefcase','"\f0b1"'),
('fa-briefcase-medical','"\f469"'),
('fa-broadcast-tower','"\f519"'),
('fa-broom','"\f51a"'),
('fa-browser','"\f37e"'),
('fa-brush','"\f55d"'),
('fa-btc','"\f15a"'),
('fa-bug','"\f188"'),
('fa-building','"\f1ad"'),
('fa-bullhorn','"\f0a1"'),
('fa-bullseye','"\f140"'),
('fa-burn','"\f46a"'),
('fa-buromobelexperte','"\f37f"'),
('fa-bus','"\f207"'),
('fa-bus-alt','"\f55e"'),
('fa-buysellads','"\f20d"'),
('fa-calculator','"\f1ec"'),
('fa-calendar','"\f133"'),
('fa-calendar-alt','"\f073"'),
('fa-calendar-check','"\f274"'),
('fa-calendar-edit','"\f333"'),
('fa-calendar-exclamation','"\f334"'),
('fa-calendar-minus','"\f272"'),
('fa-calendar-plus','"\f271"'),
('fa-calendar-times','"\f273"'),
('fa-camera','"\f030"'),
('fa-camera-alt','"\f332"'),
('fa-camera-retro','"\f083"'),
('fa-cannabis','"\f55f"'),
('fa-capsules','"\f46b"'),
('fa-car','"\f1b9"'),
('fa-caret-circle-down','"\f32d"'),
('fa-caret-circle-left','"\f32e"'),
('fa-caret-circle-right','"\f330"'),
('fa-caret-circle-up','"\f331"'),
('fa-caret-down','"\f0d7"'),
('fa-caret-left','"\f0d9"'),
('fa-caret-right','"\f0da"'),
('fa-caret-square-down','"\f150"'),
('fa-caret-square-left','"\f191"'),
('fa-caret-square-right','"\f152"'),
('fa-caret-square-up','"\f151"'),
('fa-caret-up','"\f0d8"'),
('fa-cart-arrow-down','"\f218"'),
('fa-cart-plus','"\f217"'),
('fa-cc-amazon-pay','"\f42d"'),
('fa-cc-amex','"\f1f3"'),
('fa-cc-apple-pay','"\f416"'),
('fa-cc-diners-club','"\f24c"'),
('fa-cc-discover','"\f1f2"'),
('fa-cc-jcb','"\f24b"'),
('fa-cc-mastercard','"\f1f1"'),
('fa-cc-paypal','"\f1f4"'),
('fa-cc-stripe','"\f1f5"'),
('fa-cc-visa','"\f1f0"'),
('fa-centercode','"\f380"'),
('fa-certificate','"\f0a3"'),
('fa-chalkboard','"\f51b"'),
('fa-chalkboard-teacher','"\f51c"'),
('fa-chart-area','"\f1fe"'),
('fa-chart-bar','"\f080"'),
('fa-chart-line','"\f201"'),
('fa-chart-pie','"\f200"'),
('fa-check','"\f00c"'),
('fa-check-circle','"\f058"'),
('fa-check-double','"\f560"'),
('fa-check-square','"\f14a"'),
('fa-chess','"\f439"'),
('fa-chess-bishop','"\f43a"'),
('fa-chess-bishop-alt','"\f43b"'),
('fa-chess-board','"\f43c"'),
('fa-chess-clock','"\f43d"'),
('fa-chess-clock-alt','"\f43e"'),
('fa-chess-king','"\f43f"'),
('fa-chess-king-alt','"\f440"'),
('fa-chess-knight','"\f441"'),
('fa-chess-knight-alt','"\f442"'),
('fa-chess-pawn','"\f443"'),
('fa-chess-pawn-alt','"\f444"'),
('fa-chess-queen','"\f445"'),
('fa-chess-queen-alt','"\f446"'),
('fa-chess-rook','"\f447"'),
('fa-chess-rook-alt','"\f448"'),
('fa-chevron-circle-down','"\f13a"'),
('fa-chevron-circle-left','"\f137"'),
('fa-chevron-circle-right','"\f138"'),
('fa-chevron-circle-up','"\f139"'),
('fa-chevron-double-down','"\f322"'),
('fa-chevron-double-left','"\f323"'),
('fa-chevron-double-right','"\f324"'),
('fa-chevron-double-up','"\f325"'),
('fa-chevron-down','"\f078"'),
('fa-chevron-left','"\f053"'),
('fa-chevron-right','"\f054"'),
('fa-chevron-square-down','"\f329"'),
('fa-chevron-square-left','"\f32a"'),
('fa-chevron-square-right','"\f32b"'),
('fa-chevron-square-up','"\f32c"'),
('fa-chevron-up','"\f077"'),
('fa-child','"\f1ae"'),
('fa-chrome','"\f268"'),
('fa-church','"\f51d"'),
('fa-circle','"\f111"'),
('fa-circle-notch','"\f1ce"'),
('fa-clipboard','"\f328"'),
('fa-clipboard-check','"\f46c"'),
('fa-clipboard-list','"\f46d"'),
('fa-clock','"\f017"'),
('fa-clone','"\f24d"'),
('fa-closed-captioning','"\f20a"'),
('fa-cloud','"\f0c2"'),
('fa-cloud-download','"\f0ed"'),
('fa-cloud-download-alt','"\f381"'),
('fa-cloud-upload','"\f0ee"'),
('fa-cloud-upload-alt','"\f382"'),
('fa-cloudscale','"\f383"'),
('fa-cloudsmith','"\f384"'),
('fa-cloudversify','"\f385"'),
('fa-club','"\f327"'),
('fa-cocktail','"\f561"'),
('fa-code','"\f121"'),
('fa-code-branch','"\f126"'),
('fa-code-commit','"\f386"'),
('fa-code-merge','"\f387"'),
('fa-codepen','"\f1cb"'),
('fa-codiepie','"\f284"'),
('fa-coffee','"\f0f4"'),
('fa-cog','"\f013"'),
('fa-cogs','"\f085"'),
('fa-coins','"\f51e"'),
('fa-columns','"\f0db"'),
('fa-comment','"\f075"'),
('fa-comment-alt','"\f27a"'),
('fa-comment-alt-check','"\f4a2"'),
('fa-comment-alt-dots','"\f4a3"'),
('fa-comment-alt-edit','"\f4a4"'),
('fa-comment-alt-exclamation','"\f4a5"'),
('fa-comment-alt-lines','"\f4a6"'),
('fa-comment-alt-minus','"\f4a7"'),
('fa-comment-alt-plus','"\f4a8"'),
('fa-comment-alt-slash','"\f4a9"'),
('fa-comment-alt-smile','"\f4aa"'),
('fa-comment-alt-times','"\f4ab"'),
('fa-comment-check','"\f4ac"'),
('fa-comment-dots','"\f4ad"'),
('fa-comment-edit','"\f4ae"'),
('fa-comment-exclamation','"\f4af"'),
('fa-comment-lines','"\f4b0"'),
('fa-comment-minus','"\f4b1"'),
('fa-comment-plus','"\f4b2"'),
('fa-comment-slash','"\f4b3"'),
('fa-comment-smile','"\f4b4"'),
('fa-comment-times','"\f4b5"'),
('fa-comments','"\f086"'),
('fa-comments-alt','"\f4b6"'),
('fa-compact-disc','"\f51f"'),
('fa-compass','"\f14e"'),
('fa-compress','"\f066"'),
('fa-compress-alt','"\f422"'),
('fa-compress-wide','"\f326"'),
('fa-concierge-bell','"\f562"'),
('fa-connectdevelop','"\f20e"'),
('fa-container-storage','"\f4b7"'),
('fa-contao','"\f26d"'),
('fa-conveyor-belt','"\f46e"'),
('fa-conveyor-belt-alt','"\f46f"'),
('fa-cookie','"\f563"'),
('fa-cookie-bite','"\f564"'),
('fa-copy','"\f0c5"'),
('fa-copyright','"\f1f9"'),
('fa-couch','"\f4b8"'),
('fa-cpanel','"\f388"'),
('fa-creative-commons','"\f25e"'),
('fa-creative-commons-by','"\f4e7"'),
('fa-creative-commons-nc','"\f4e8"'),
('fa-creative-commons-nc-eu','"\f4e9"'),
('fa-creative-commons-nc-jp','"\f4ea"'),
('fa-creative-commons-nd','"\f4eb"'),
('fa-creative-commons-pd','"\f4ec"'),
('fa-creative-commons-pd-alt','"\f4ed"'),
('fa-creative-commons-remix','"\f4ee"'),
('fa-creative-commons-sa','"\f4ef"'),
('fa-creative-commons-sampling','"\f4f0"'),
('fa-creative-commons-sampling-plus','"\f4f1"'),
('fa-creative-commons-share','"\f4f2"'),
('fa-creative-commons-zero','"\f4f3"'),
('fa-credit-card','"\f09d"'),
('fa-credit-card-blank','"\f389"'),
('fa-credit-card-front','"\f38a"'),
('fa-cricket','"\f449"'),
('fa-crop','"\f125"'),
('fa-crop-alt','"\f565"'),
('fa-crosshairs','"\f05b"'),
('fa-crow','"\f520"'),
('fa-crown','"\f521"'),
('fa-css3','"\f13c"'),
('fa-css3-alt','"\f38b"'),
('fa-cube','"\f1b2"'),
('fa-cubes','"\f1b3"'),
('fa-curling','"\f44a"'),
('fa-cut','"\f0c4"'),
('fa-cuttlefish','"\f38c"'),
('fa-d-and-d','"\f38d"'),
('fa-dashcube','"\f210"'),
('fa-database','"\f1c0"'),
('fa-deaf','"\f2a4"'),
('fa-delicious','"\f1a5"'),
('fa-deploydog','"\f38e"'),
('fa-deskpro','"\f38f"'),
('fa-desktop','"\f108"'),
('fa-desktop-alt','"\f390"'),
('fa-deviantart','"\f1bd"'),
('fa-diagnoses','"\f470"'),
('fa-diamond','"\f219"'),
('fa-dice','"\f522"'),
('fa-dice-five','"\f523"'),
('fa-dice-four','"\f524"'),
('fa-dice-one','"\f525"'),
('fa-dice-six','"\f526"'),
('fa-dice-three','"\f527"'),
('fa-dice-two','"\f528"'),
('fa-digg','"\f1a6"'),
('fa-digital-ocean','"\f391"'),
('fa-digital-tachograph','"\f566"'),
('fa-discord','"\f392"'),
('fa-discourse','"\f393"'),
('fa-divide','"\f529"'),
('fa-dizzy','"\f567"'),
('fa-dna','"\f471"'),
('fa-dochub','"\f394"'),
('fa-docker','"\f395"'),
('fa-dollar-sign','"\f155"'),
('fa-dolly','"\f472"'),
('fa-dolly-empty','"\f473"'),
('fa-dolly-flatbed','"\f474"'),
('fa-dolly-flatbed-alt','"\f475"'),
('fa-dolly-flatbed-empty','"\f476"'),
('fa-donate','"\f4b9"'),
('fa-door-closed','"\f52a"'),
('fa-door-open','"\f52b"'),
('fa-dot-circle','"\f192"'),
('fa-dove','"\f4ba"'),
('fa-download','"\f019"'),
('fa-draft2digital','"\f396"'),
('fa-drafting-compass','"\f568"'),
('fa-dribbble','"\f17d"'),
('fa-dribbble-square','"\f397"'),
('fa-dropbox','"\f16b"'),
('fa-drum','"\f569"'),
('fa-drum-steelpan','"\f56a"'),
('fa-drupal','"\f1a9"'),
('fa-dumbbell','"\f44b"'),
('fa-dyalog','"\f399"'),
('fa-earlybirds','"\f39a"'),
('fa-ebay','"\f4f4"'),
('fa-edge','"\f282"'),
('fa-edit','"\f044"'),
('fa-eject','"\f052"'),
('fa-elementor','"\f430"'),
('fa-ellipsis-h','"\f141"'),
('fa-ellipsis-h-alt','"\f39b"'),
('fa-ellipsis-v','"\f142"'),
('fa-ellipsis-v-alt','"\f39c"'),
('fa-ember','"\f423"'),
('fa-empire','"\f1d1"'),
('fa-envelope','"\f0e0"'),
('fa-envelope-open','"\f2b6"'),
('fa-envelope-square','"\f199"'),
('fa-envira','"\f299"'),
('fa-equals','"\f52c"'),
('fa-eraser','"\f12d"'),
('fa-erlang','"\f39d"'),
('fa-ethereum','"\f42e"'),
('fa-etsy','"\f2d7"'),
('fa-euro-sign','"\f153"'),
('fa-exchange','"\f0ec"'),
('fa-exchange-alt','"\f362"'),
('fa-exclamation','"\f12a"'),
('fa-exclamation-circle','"\f06a"'),
('fa-exclamation-square','"\f321"'),
('fa-exclamation-triangle','"\f071"'),
('fa-expand','"\f065"'),
('fa-expand-alt','"\f424"'),
('fa-expand-arrows','"\f31d"'),
('fa-expand-arrows-alt','"\f31e"'),
('fa-expand-wide','"\f320"'),
('fa-expeditedssl','"\f23e"'),
('fa-external-link','"\f08e"'),
('fa-external-link-alt','"\f35d"'),
('fa-external-link-square','"\f14c"'),
('fa-external-link-square-alt','"\f360"'),
('fa-eye','"\f06e"'),
('fa-eye-dropper','"\f1fb"'),
('fa-eye-slash','"\f070"'),
('fa-facebook','"\f09a"'),
('fa-facebook-f','"\f39e"'),
('fa-facebook-messenger','"\f39f"'),
('fa-facebook-square','"\f082"'),
('fa-fast-backward','"\f049"'),
('fa-fast-forward','"\f050"'),
('fa-fax','"\f1ac"'),
('fa-feather','"\f52d"'),
('fa-feather-alt','"\f56b"'),
('fa-female','"\f182"'),
('fa-field-hockey','"\f44c"'),
('fa-fighter-jet','"\f0fb"'),
('fa-file','"\f15b"'),
('fa-file-alt','"\f15c"'),
('fa-file-archive','"\f1c6"'),
('fa-file-audio','"\f1c7"'),
('fa-file-check','"\f316"'),
('fa-file-code','"\f1c9"'),
('fa-file-contract','"\f56c"'),
('fa-file-download','"\f56d"'),
('fa-file-edit','"\f31c"'),
('fa-file-excel','"\f1c3"'),
('fa-file-exclamation','"\f31a"'),
('fa-file-export','"\f56e"'),
('fa-file-image','"\f1c5"'),
('fa-file-import','"\f56f"'),
('fa-file-invoice','"\f570"'),
('fa-file-invoice-dollar','"\f571"'),
('fa-file-medical','"\f477"'),
('fa-file-medical-alt','"\f478"'),
('fa-file-minus','"\f318"'),
('fa-file-pdf','"\f1c1"'),
('fa-file-plus','"\f319"'),
('fa-file-powerpoint','"\f1c4"'),
('fa-file-prescription','"\f572"'),
('fa-file-signature','"\f573"'),
('fa-file-times','"\f317"'),
('fa-file-upload','"\f574"'),
('fa-file-video','"\f1c8"'),
('fa-file-word','"\f1c2"'),
('fa-fill','"\f575"'),
('fa-fill-drip','"\f576"'),
('fa-film','"\f008"'),
('fa-film-alt','"\f3a0"'),
('fa-filter','"\f0b0"'),
('fa-fingerprint','"\f577"'),
('fa-fire','"\f06d"'),
('fa-fire-extinguisher','"\f134"'),
('fa-firefox','"\f269"'),
('fa-first-aid','"\f479"'),
('fa-first-order','"\f2b0"'),
('fa-first-order-alt','"\f50a"'),
('fa-firstdraft','"\f3a1"'),
('fa-fish','"\f578"'),
('fa-flag','"\f024"'),
('fa-flag-checkered','"\f11e"'),
('fa-flask','"\f0c3"'),
('fa-flickr','"\f16e"'),
('fa-flipboard','"\f44d"'),
('fa-flushed','"\f579"'),
('fa-fly','"\f417"'),
('fa-folder','"\f07b"'),
('fa-folder-open','"\f07c"'),
('fa-font','"\f031"'),
('fa-font-awesome','"\f2b4"'),
('fa-font-awesome-alt','"\f35c"'),
('fa-font-awesome-flag','"\f425"'),
('fa-font-awesome-logo-full','"\f4e6"'),
('fa-fonticons','"\f280"'),
('fa-fonticons-fi','"\f3a2"'),
('fa-football-ball','"\f44e"'),
('fa-football-helmet','"\f44f"'),
('fa-forklift','"\f47a"'),
('fa-fort-awesome','"\f286"'),
('fa-fort-awesome-alt','"\f3a3"'),
('fa-forumbee','"\f211"'),
('fa-forward','"\f04e"'),
('fa-foursquare','"\f180"'),
('fa-fragile','"\f4bb"'),
('fa-free-code-camp','"\f2c5"'),
('fa-freebsd','"\f3a4"'),
('fa-frog','"\f52e"'),
('fa-frown','"\f119"'),
('fa-frown-open','"\f57a"'),
('fa-fulcrum','"\f50b"'),
('fa-futbol','"\f1e3"'),
('fa-galactic-republic','"\f50c"'),
('fa-galactic-senate','"\f50d"'),
('fa-gamepad','"\f11b"'),
('fa-gas-pump','"\f52f"'),
('fa-gavel','"\f0e3"'),
('fa-gem','"\f3a5"'),
('fa-genderless','"\f22d"'),
('fa-get-pocket','"\f265"'),
('fa-gg','"\f260"'),
('fa-gg-circle','"\f261"'),
('fa-gift','"\f06b"'),
('fa-git','"\f1d3"'),
('fa-git-square','"\f1d2"'),
('fa-github','"\f09b"'),
('fa-github-alt','"\f113"'),
('fa-github-square','"\f092"'),
('fa-gitkraken','"\f3a6"'),
('fa-gitlab','"\f296"'),
('fa-gitter','"\f426"'),
('fa-glass-martini','"\f000"'),
('fa-glass-martini-alt','"\f57b"'),
('fa-glasses','"\f530"'),
('fa-glide','"\f2a5"'),
('fa-glide-g','"\f2a6"'),
('fa-globe','"\f0ac"'),
('fa-globe-africa','"\f57c"'),
('fa-globe-americas','"\f57d"'),
('fa-globe-asia','"\f57e"'),
('fa-gofore','"\f3a7"'),
('fa-golf-ball','"\f450"'),
('fa-golf-club','"\f451"'),
('fa-goodreads','"\f3a8"'),
('fa-goodreads-g','"\f3a9"'),
('fa-google','"\f1a0"'),
('fa-google-drive','"\f3aa"'),
('fa-google-play','"\f3ab"'),
('fa-google-plus','"\f2b3"'),
('fa-google-plus-g','"\f0d5"'),
('fa-google-plus-square','"\f0d4"'),
('fa-google-wallet','"\f1ee"'),
('fa-graduation-cap','"\f19d"'),
('fa-gratipay','"\f184"'),
('fa-grav','"\f2d6"'),
('fa-greater-than','"\f531"'),
('fa-greater-than-equal','"\f532"'),
('fa-grimace','"\f57f"'),
('fa-grin','"\f580"'),
('fa-grin-alt','"\f581"'),
('fa-grin-beam','"\f582"'),
('fa-grin-beam-sweat','"\f583"'),
('fa-grin-hearts','"\f584"'),
('fa-grin-squint','"\f585"'),
('fa-grin-squint-tears','"\f586"'),
('fa-grin-stars','"\f587"'),
('fa-grin-tears','"\f588"'),
('fa-grin-tongue','"\f589"'),
('fa-grin-tongue-squint','"\f58a"'),
('fa-grin-tongue-wink','"\f58b"'),
('fa-grin-wink','"\f58c"'),
('fa-grip-horizontal','"\f58d"'),
('fa-grip-vertical','"\f58e"'),
('fa-gripfire','"\f3ac"'),
('fa-grunt','"\f3ad"'),
('fa-gulp','"\f3ae"'),
('fa-h-square','"\f0fd"'),
('fa-h1','"\f313"'),
('fa-h2','"\f314"'),
('fa-h3','"\f315"'),
('fa-hacker-news','"\f1d4"'),
('fa-hacker-news-square','"\f3af"'),
('fa-hand-heart','"\f4bc"'),
('fa-hand-holding','"\f4bd"'),
('fa-hand-holding-box','"\f47b"'),
('fa-hand-holding-heart','"\f4be"'),
('fa-hand-holding-seedling','"\f4bf"'),
('fa-hand-holding-usd','"\f4c0"'),
('fa-hand-holding-water','"\f4c1"'),
('fa-hand-lizard','"\f258"'),
('fa-hand-paper','"\f256"'),
('fa-hand-peace','"\f25b"'),
('fa-hand-point-down','"\f0a7"'),
('fa-hand-point-left','"\f0a5"'),
('fa-hand-point-right','"\f0a4"'),
('fa-hand-point-up','"\f0a6"'),
('fa-hand-pointer','"\f25a"'),
('fa-hand-receiving','"\f47c"'),
('fa-hand-rock','"\f255"'),
('fa-hand-scissors','"\f257"'),
('fa-hand-spock','"\f259"'),
('fa-hands','"\f4c2"'),
('fa-hands-heart','"\f4c3"'),
('fa-hands-helping','"\f4c4"'),
('fa-hands-usd','"\f4c5"'),
('fa-handshake','"\f2b5"'),
('fa-handshake-alt','"\f4c6"'),
('fa-hashtag','"\f292"'),
('fa-hdd','"\f0a0"'),
('fa-heading','"\f1dc"'),
('fa-headphones','"\f025"'),
('fa-headphones-alt','"\f58f"'),
('fa-headset','"\f590"'),
('fa-heart','"\f004"'),
('fa-heart-circle','"\f4c7"'),
('fa-heart-square','"\f4c8"'),
('fa-heartbeat','"\f21e"'),
('fa-helicopter','"\f533"'),
('fa-hexagon','"\f312"'),
('fa-highlighter','"\f591"'),
('fa-hips','"\f452"'),
('fa-hire-a-helper','"\f3b0"'),
('fa-history','"\f1da"'),
('fa-hockey-puck','"\f453"'),
('fa-hockey-sticks','"\f454"'),
('fa-home','"\f015"'),
('fa-home-heart','"\f4c9"'),
('fa-hooli','"\f427"'),
('fa-hornbill','"\f592"'),
('fa-hospital','"\f0f8"'),
('fa-hospital-alt','"\f47d"'),
('fa-hospital-symbol','"\f47e"'),
('fa-hot-tub','"\f593"'),
('fa-hotel','"\f594"'),
('fa-hotjar','"\f3b1"'),
('fa-hourglass','"\f254"'),
('fa-hourglass-end','"\f253"'),
('fa-hourglass-half','"\f252"'),
('fa-hourglass-start','"\f251"'),
('fa-houzz','"\f27c"'),
('fa-html5','"\f13b"'),
('fa-hubspot','"\f3b2"'),
('fa-i-cursor','"\f246"'),
('fa-id-badge','"\f2c1"'),
('fa-id-card','"\f2c2"'),
('fa-id-card-alt','"\f47f"'),
('fa-image','"\f03e"'),
('fa-images','"\f302"'),
('fa-imdb','"\f2d8"'),
('fa-inbox','"\f01c"'),
('fa-inbox-in','"\f310"'),
('fa-inbox-out','"\f311"'),
('fa-indent','"\f03c"'),
('fa-industry','"\f275"'),
('fa-industry-alt','"\f3b3"'),
('fa-infinity','"\f534"'),
('fa-info','"\f129"'),
('fa-info-circle','"\f05a"'),
('fa-info-square','"\f30f"'),
('fa-instagram','"\f16d"'),
('fa-internet-explorer','"\f26b"'),
('fa-inventory','"\f480"'),
('fa-ioxhost','"\f208"'),
('fa-italic','"\f033"'),
('fa-itunes','"\f3b4"'),
('fa-itunes-note','"\f3b5"'),
('fa-jack-o-lantern','"\f30e"'),
('fa-java','"\f4e4"'),
('fa-jedi-order','"\f50e"'),
('fa-jenkins','"\f3b6"'),
('fa-joget','"\f3b7"'),
('fa-joint','"\f595"'),
('fa-joomla','"\f1aa"'),
('fa-js','"\f3b8"'),
('fa-js-square','"\f3b9"'),
('fa-jsfiddle','"\f1cc"'),
('fa-key','"\f084"'),
('fa-keybase','"\f4f5"'),
('fa-keyboard','"\f11c"'),
('fa-keycdn','"\f3ba"'),
('fa-kickstarter','"\f3bb"'),
('fa-kickstarter-k','"\f3bc"'),
('fa-kiss','"\f596"'),
('fa-kiss-beam','"\f597"'),
('fa-kiss-wink-heart','"\f598"'),
('fa-kiwi-bird','"\f535"'),
('fa-korvue','"\f42f"'),
('fa-lamp','"\f4ca"'),
('fa-language','"\f1ab"'),
('fa-laptop','"\f109"'),
('fa-laravel','"\f3bd"'),
('fa-lastfm','"\f202"'),
('fa-lastfm-square','"\f203"'),
('fa-laugh','"\f599"'),
('fa-laugh-beam','"\f59a"'),
('fa-laugh-squint','"\f59b"'),
('fa-laugh-wink','"\f59c"'),
('fa-leaf','"\f06c"'),
('fa-leaf-heart','"\f4cb"'),
('fa-leanpub','"\f212"'),
('fa-lemon','"\f094"'),
('fa-less','"\f41d"'),
('fa-less-than','"\f536"'),
('fa-less-than-equal','"\f537"'),
('fa-level-down','"\f149"'),
('fa-level-down-alt','"\f3be"'),
('fa-level-up','"\f148"'),
('fa-level-up-alt','"\f3bf"'),
('fa-life-ring','"\f1cd"'),
('fa-lightbulb','"\f0eb"'),
('fa-line','"\f3c0"'),
('fa-link','"\f0c1"'),
('fa-linkedin','"\f08c"'),
('fa-linkedin-in','"\f0e1"'),
('fa-linode','"\f2b8"'),
('fa-linux','"\f17c"'),
('fa-lira-sign','"\f195"'),
('fa-list','"\f03a"'),
('fa-list-alt','"\f022"'),
('fa-list-ol','"\f0cb"'),
('fa-list-ul','"\f0ca"'),
('fa-location-arrow','"\f124"'),
('fa-lock','"\f023"'),
('fa-lock-alt','"\f30d"'),
('fa-lock-open','"\f3c1"'),
('fa-lock-open-alt','"\f3c2"'),
('fa-long-arrow-alt-down','"\f309"'),
('fa-long-arrow-alt-left','"\f30a"'),
('fa-long-arrow-alt-right','"\f30b"'),
('fa-long-arrow-alt-up','"\f30c"'),
('fa-long-arrow-down','"\f175"'),
('fa-long-arrow-left','"\f177"'),
('fa-long-arrow-right','"\f178"'),
('fa-long-arrow-up','"\f176"'),
('fa-loveseat','"\f4cc"'),
('fa-low-vision','"\f2a8"'),
('fa-luchador','"\f455"'),
('fa-luggage-cart','"\f59d"'),
('fa-lyft','"\f3c3"'),
('fa-magento','"\f3c4"'),
('fa-magic','"\f0d0"'),
('fa-magnet','"\f076"'),
('fa-mailchimp','"\f59e"'),
('fa-male','"\f183"'),
('fa-mandalorian','"\f50f"'),
('fa-map','"\f279"'),
('fa-map-marked','"\f59f"'),
('fa-map-marked-alt','"\f5a0"'),
('fa-map-marker','"\f041"'),
('fa-map-marker-alt','"\f3c5"'),
('fa-map-pin','"\f276"'),
('fa-map-signs','"\f277"'),
('fa-marker','"\f5a1"'),
('fa-mars','"\f222"'),
('fa-mars-double','"\f227"'),
('fa-mars-stroke','"\f229"'),
('fa-mars-stroke-h','"\f22b"'),
('fa-mars-stroke-v','"\f22a"'),
('fa-mastodon','"\f4f6"'),
('fa-maxcdn','"\f136"'),
('fa-medal','"\f5a2"'),
('fa-medapps','"\f3c6"'),
('fa-medium','"\f23a"'),
('fa-medium-m','"\f3c7"'),
('fa-medkit','"\f0fa"'),
('fa-medrt','"\f3c8"'),
('fa-meetup','"\f2e0"'),
('fa-megaport','"\f5a3"'),
('fa-meh','"\f11a"'),
('fa-meh-blank','"\f5a4"'),
('fa-meh-rolling-eyes','"\f5a5"'),
('fa-memory','"\f538"'),
('fa-mercury','"\f223"'),
('fa-microchip','"\f2db"'),
('fa-microphone','"\f130"'),
('fa-microphone-alt','"\f3c9"'),
('fa-microphone-alt-slash','"\f539"'),
('fa-microphone-slash','"\f131"'),
('fa-microsoft','"\f3ca"'),
('fa-minus','"\f068"'),
('fa-minus-circle','"\f056"'),
('fa-minus-hexagon','"\f307"'),
('fa-minus-octagon','"\f308"'),
('fa-minus-square','"\f146"'),
('fa-mix','"\f3cb"'),
('fa-mixcloud','"\f289"'),
('fa-mizuni','"\f3cc"'),
('fa-mobile','"\f10b"'),
('fa-mobile-alt','"\f3cd"'),
('fa-mobile-android','"\f3ce"'),
('fa-mobile-android-alt','"\f3cf"'),
('fa-modx','"\f285"'),
('fa-monero','"\f3d0"'),
('fa-money-bill','"\f0d6"'),
('fa-money-bill-alt','"\f3d1"'),
('fa-money-bill-wave','"\f53a"'),
('fa-money-bill-wave-alt','"\f53b"'),
('fa-money-check','"\f53c"'),
('fa-money-check-alt','"\f53d"'),
('fa-monument','"\f5a6"'),
('fa-moon','"\f186"'),
('fa-mortar-pestle','"\f5a7"'),
('fa-motorcycle','"\f21c"'),
('fa-mouse-pointer','"\f245"'),
('fa-music','"\f001"'),
('fa-napster','"\f3d2"'),
('fa-neuter','"\f22c"'),
('fa-newspaper','"\f1ea"'),
('fa-nimblr','"\f5a8"'),
('fa-nintendo-switch','"\f418"'),
('fa-node','"\f419"'),
('fa-node-js','"\f3d3"'),
('fa-not-equal','"\f53e"'),
('fa-notes-medical','"\f481"'),
('fa-npm','"\f3d4"'),
('fa-ns8','"\f3d5"'),
('fa-nutritionix','"\f3d6"'),
('fa-object-group','"\f247"'),
('fa-object-ungroup','"\f248"'),
('fa-octagon','"\f306"'),
('fa-odnoklassniki','"\f263"'),
('fa-odnoklassniki-square','"\f264"'),
('fa-old-republic','"\f510"'),
('fa-opencart','"\f23d"'),
('fa-openid','"\f19b"'),
('fa-opera','"\f26a"'),
('fa-optin-monster','"\f23c"'),
('fa-osi','"\f41a"'),
('fa-outdent','"\f03b"'),
('fa-page4','"\f3d7"'),
('fa-pagelines','"\f18c"'),
('fa-paint-brush','"\f1fc"'),
('fa-paint-brush-alt','"\f5a9"'),
('fa-paint-roller','"\f5aa"'),
('fa-palette','"\f53f"'),
('fa-palfed','"\f3d8"'),
('fa-pallet','"\f482"'),
('fa-pallet-alt','"\f483"'),
('fa-paper-plane','"\f1d8"'),
('fa-paperclip','"\f0c6"'),
('fa-parachute-box','"\f4cd"'),
('fa-paragraph','"\f1dd"'),
('fa-parking','"\f540"'),
('fa-passport','"\f5ab"'),
('fa-paste','"\f0ea"'),
('fa-patreon','"\f3d9"'),
('fa-pause','"\f04c"'),
('fa-pause-circle','"\f28b"'),
('fa-paw','"\f1b0"'),
('fa-paypal','"\f1ed"'),
('fa-pen','"\f304"'),
('fa-pen-alt','"\f305"'),
('fa-pen-fancy','"\f5ac"'),
('fa-pen-nib','"\f5ad"'),
('fa-pen-square','"\f14b"'),
('fa-pencil','"\f040"'),
('fa-pencil-alt','"\f303"'),
('fa-pencil-ruler','"\f5ae"'),
('fa-pennant','"\f456"'),
('fa-people-carry','"\f4ce"'),
('fa-percent','"\f295"'),
('fa-percentage','"\f541"'),
('fa-periscope','"\f3da"'),
('fa-person-carry','"\f4cf"'),
('fa-person-dolly','"\f4d0"'),
('fa-person-dolly-empty','"\f4d1"'),
('fa-phabricator','"\f3db"'),
('fa-phoenix-framework','"\f3dc"'),
('fa-phoenix-squadron','"\f511"'),
('fa-phone','"\f095"'),
('fa-phone-plus','"\f4d2"'),
('fa-phone-slash','"\f3dd"'),
('fa-phone-square','"\f098"'),
('fa-phone-volume','"\f2a0"'),
('fa-php','"\f457"'),
('fa-pied-piper','"\f2ae"'),
('fa-pied-piper-alt','"\f1a8"'),
('fa-pied-piper-hat','"\f4e5"'),
('fa-pied-piper-pp','"\f1a7"'),
('fa-piggy-bank','"\f4d3"'),
('fa-pills','"\f484"'),
('fa-pinterest','"\f0d2"'),
('fa-pinterest-p','"\f231"'),
('fa-pinterest-square','"\f0d3"'),
('fa-plane','"\f072"'),
('fa-plane-alt','"\f3de"'),
('fa-plane-arrival','"\f5af"'),
('fa-plane-departure','"\f5b0"'),
('fa-play','"\f04b"'),
('fa-play-circle','"\f144"'),
('fa-playstation','"\f3df"'),
('fa-plug','"\f1e6"'),
('fa-plus','"\f067"'),
('fa-plus-circle','"\f055"'),
('fa-plus-hexagon','"\f300"'),
('fa-plus-octagon','"\f301"'),
('fa-plus-square','"\f0fe"'),
('fa-podcast','"\f2ce"'),
('fa-poo','"\f2fe"'),
('fa-portrait','"\f3e0"'),
('fa-pound-sign','"\f154"'),
('fa-power-off','"\f011"'),
('fa-prescription','"\f5b1"'),
('fa-prescription-bottle','"\f485"'),
('fa-prescription-bottle-alt','"\f486"'),
('fa-print','"\f02f"'),
('fa-procedures','"\f487"'),
('fa-product-hunt','"\f288"'),
('fa-project-diagram','"\f542"'),
('fa-pushed','"\f3e1"'),
('fa-puzzle-piece','"\f12e"'),
('fa-python','"\f3e2"'),
('fa-qq','"\f1d6"'),
('fa-qrcode','"\f029"'),
('fa-question','"\f128"'),
('fa-question-circle','"\f059"'),
('fa-question-square','"\f2fd"'),
('fa-quidditch','"\f458"'),
('fa-quinscape','"\f459"'),
('fa-quora','"\f2c4"'),
('fa-quote-left','"\f10d"'),
('fa-quote-right','"\f10e"'),
('fa-r-project','"\f4f7"'),
('fa-racquet','"\f45a"'),
('fa-ramp-loading','"\f4d4"'),
('fa-random','"\f074"'),
('fa-ravelry','"\f2d9"'),
('fa-react','"\f41b"'),
('fa-readme','"\f4d5"'),
('fa-rebel','"\f1d0"'),
('fa-receipt','"\f543"'),
('fa-rectangle-landscape','"\f2fa"'),
('fa-rectangle-portrait','"\f2fb"'),
('fa-rectangle-wide','"\f2fc"'),
('fa-recycle','"\f1b8"'),
('fa-red-river','"\f3e3"'),
('fa-reddit','"\f1a1"'),
('fa-reddit-alien','"\f281"'),
('fa-reddit-square','"\f1a2"'),
('fa-redo','"\f01e"'),
('fa-redo-alt','"\f2f9"'),
('fa-registered','"\f25d"'),
('fa-rendact','"\f3e4"'),
('fa-renren','"\f18b"'),
('fa-repeat','"\f363"'),
('fa-repeat-1','"\f365"'),
('fa-repeat-1-alt','"\f366"'),
('fa-repeat-alt','"\f364"'),
('fa-reply','"\f3e5"'),
('fa-reply-all','"\f122"'),
('fa-replyd','"\f3e6"'),
('fa-researchgate','"\f4f8"'),
('fa-resolving','"\f3e7"'),
('fa-retweet','"\f079"'),
('fa-retweet-alt','"\f361"'),
('fa-rev','"\f5b2"'),
('fa-ribbon','"\f4d6"'),
('fa-road','"\f018"'),
('fa-robot','"\f544"'),
('fa-rocket','"\f135"'),
('fa-rocketchat','"\f3e8"'),
('fa-rockrms','"\f3e9"'),
('fa-route','"\f4d7"'),
('fa-rss','"\f09e"'),
('fa-rss-square','"\f143"'),
('fa-ruble-sign','"\f158"'),
('fa-ruler','"\f545"'),
('fa-ruler-combined','"\f546"'),
('fa-ruler-horizontal','"\f547"'),
('fa-ruler-vertical','"\f548"'),
('fa-rupee-sign','"\f156"'),
('fa-sad-cry','"\f5b3"'),
('fa-sad-tear','"\f5b4"'),
('fa-safari','"\f267"'),
('fa-sass','"\f41e"'),
('fa-save','"\f0c7"'),
('fa-scanner','"\f488"'),
('fa-scanner-keyboard','"\f489"'),
('fa-scanner-touchscreen','"\f48a"'),
('fa-schlix','"\f3ea"'),
('fa-school','"\f549"'),
('fa-screwdriver','"\f54a"'),
('fa-scribd','"\f28a"'),
('fa-scrubber','"\f2f8"'),
('fa-search','"\f002"'),
('fa-search-minus','"\f010"'),
('fa-search-plus','"\f00e"'),
('fa-searchengin','"\f3eb"'),
('fa-seedling','"\f4d8"'),
('fa-sellcast','"\f2da"'),
('fa-sellsy','"\f213"'),
('fa-server','"\f233"'),
('fa-servicestack','"\f3ec"'),
('fa-share','"\f064"'),
('fa-share-all','"\f367"'),
('fa-share-alt','"\f1e0"'),
('fa-share-alt-square','"\f1e1"'),
('fa-share-square','"\f14d"'),
('fa-shekel-sign','"\f20b"'),
('fa-shield','"\f132"'),
('fa-shield-alt','"\f3ed"'),
('fa-shield-check','"\f2f"'),
('fa-ship','"\f21a"'),
('fa-shipping-fast','"\f48b"'),
('fa-shipping-timed','"\f48c"'),
('fa-shirtsinbulk','"\f214"'),
('fa-shoe-prints','"\f54b"'),
('fa-shopping-bag','"\f290"'),
('fa-shopping-basket','"\f291"'),
('fa-shopping-cart','"\f07a"'),
('fa-shopware','"\f5b5"'),
('fa-shower','"\f2cc"'),
('fa-shuttle-van','"\f5b6"'),
('fa-shuttlecock','"\f45b"'),
('fa-sign','"\f4d9"'),
('fa-sign-in','"\f090"'),
('fa-sign-in-alt','"\f2f6"'),
('fa-sign-language','"\f2a7"'),
('fa-sign-out','"\f08b"'),
('fa-sign-out-alt','"\f2f5"'),
('fa-signal','"\f012"'),
('fa-signature','"\f5b7"'),
('fa-simplybuilt','"\f215"'),
('fa-sistrix','"\f3ee"'),
('fa-sitemap','"\f0e8"'),
('fa-sith','"\f512"'),
('fa-skull','"\f54c"'),
('fa-skyatlas','"\f216"'),
('fa-skype','"\f17e"'),
('fa-slack','"\f198"'),
('fa-slack-hash','"\f3ef"'),
('fa-sliders-h','"\f1de"'),
('fa-sliders-h-square','"\f3f0"'),
('fa-sliders-v','"\f3f1"'),
('fa-sliders-v-square','"\f3f2"'),
('fa-slideshare','"\f1e7"'),
('fa-smile','"\f118"'),
('fa-smile-beam','"\f5b8"'),
('fa-smile-plus','"\f5b9"'),
('fa-smile-wink','"\f4da"'),
('fa-smoking','"\f48d"'),
('fa-smoking-ban','"\f54d"'),
('fa-snapchat','"\f2ab"'),
('fa-snapchat-ghost','"\f2ac"'),
('fa-snapchat-square','"\f2ad"'),
('fa-snowflake','"\f2dc"'),
('fa-solar-panel','"\f5ba"'),
('fa-sort','"\f0dc"'),
('fa-sort-alpha-down','"\f15d"'),
('fa-sort-alpha-up','"\f15e"'),
('fa-sort-amount-down','"\f160"'),
('fa-sort-amount-up','"\f161"'),
('fa-sort-down','"\f0dd"'),
('fa-sort-numeric-down','"\f162"'),
('fa-sort-numeric-up','"\f163"'),
('fa-sort-up','"\f0de"'),
('fa-soundcloud','"\f1be"'),
('fa-spa','"\f5bb"'),
('fa-space-shuttle','"\f197"'),
('fa-spade','"\f2f4"'),
('fa-speakap','"\f3f3"'),
('fa-spinner','"\f110"'),
('fa-spinner-third','"\f3f4"'),
('fa-splotch','"\f5bc"'),
('fa-spotify','"\f1bc"'),
('fa-spray-can','"\f5bd"'),
('fa-square','"\f0c8"'),
('fa-square-full','"\f45c"'),
('fa-squarespace','"\f5be"'),
('fa-stack-exchange','"\f18d"'),
('fa-stack-overflow','"\f16c"'),
('fa-stamp','"\f5bf"'),
('fa-star','"\f005"'),
('fa-star-exclamation','"\f2f3"'),
('fa-star-half','"\f089"'),
('fa-star-half-alt','"\f5c0"'),
('fa-staylinked','"\f3f5"'),
('fa-steam','"\f1b6"'),
('fa-steam-square','"\f1b7"'),
('fa-steam-symbol','"\f3f6"'),
('fa-step-backward','"\f048"'),
('fa-step-forward','"\f051"'),
('fa-stethoscope','"\f0f1"'),
('fa-sticker-mule','"\f3f7"'),
('fa-sticky-note','"\f249"'),
('fa-stop','"\f04d"'),
('fa-stop-circle','"\f28d"'),
('fa-stopwatch','"\f2f2"'),
('fa-store','"\f54e"'),
('fa-store-alt','"\f54f"'),
('fa-strava','"\f428"'),
('fa-stream','"\f550"'),
('fa-street-view','"\f21d"'),
('fa-strikethrough','"\f0cc"'),
('fa-stripe','"\f429"'),
('fa-stripe-s','"\f42a"'),
('fa-stroopwafel','"\f551"'),
('fa-studiovinari','"\f3f8"'),
('fa-stumbleupon','"\f1a4"'),
('fa-stumbleupon-circle','"\f1a3"'),
('fa-subscript','"\f12c"'),
('fa-subway','"\f239"'),
('fa-suitcase','"\f0f2"'),
('fa-suitcase-rolling','"\f5c1"'),
('fa-sun','"\f185"'),
('fa-superpowers','"\f2dd"'),
('fa-superscript','"\f12b"'),
('fa-supple','"\f3f9"'),
('fa-surprise','"\f5c2"'),
('fa-swatchbook','"\f5c3"'),
('fa-swimmer','"\f5c4"'),
('fa-swimming-pool','"\f5c5"'),
('fa-sync','"\f021"'),
('fa-sync-alt','"\f2f1"'),
('fa-syringe','"\f48e"'),
('fa-table','"\f0ce"'),
('fa-table-tennis','"\f45d"'),
('fa-tablet','"\f10a"'),
('fa-tablet-alt','"\f3fa"'),
('fa-tablet-android','"\f3fb"'),
('fa-tablet-android-alt','"\f3fc"'),
('fa-tablet-rugged','"\f48f"'),
('fa-tablets','"\f490"'),
('fa-tachometer','"\f0e4"'),
('fa-tachometer-alt','"\f3fd"'),
('fa-tag','"\f02b"'),
('fa-tags','"\f02c"'),
('fa-tape','"\f4db"'),
('fa-tasks','"\f0ae"'),
('fa-taxi','"\f1ba"'),
('fa-teamspeak','"\f4f9"'),
('fa-telegram','"\f2c6"'),
('fa-telegram-plane','"\f3fe"'),
('fa-tencent-weibo','"\f1d5"'),
('fa-tennis-ball','"\f45e"'),
('fa-terminal','"\f120"'),
('fa-text-height','"\f034"'),
('fa-text-width','"\f035"'),
('fa-th','"\f00a"'),
('fa-th-large','"\f009"'),
('fa-th-list','"\f00b"'),
('fa-themeco','"\f5c6"'),
('fa-themeisle','"\f2b2"'),
('fa-thermometer','"\f491"'),
('fa-thermometer-empty','"\f2cb"'),
('fa-thermometer-full','"\f2c7"'),
('fa-thermometer-half','"\f2c9"'),
('fa-thermometer-quarter','"\f2ca"'),
('fa-thermometer-three-quarters','"\f2c8"'),
('fa-thumbs-down','"\f165"'),
('fa-thumbs-up','"\f164"'),
('fa-thumbtack','"\f08d"'),
('fa-ticket','"\f145"'),
('fa-ticket-alt','"\f3ff"'),
('fa-times','"\f00d"'),
('fa-times-circle','"\f057"'),
('fa-times-hexagon','"\f2ee"'),
('fa-times-octagon','"\f2f0"'),
('fa-times-square','"\f2d3"'),
('fa-tint','"\f043"'),
('fa-tint-slash','"\f5c7"'),
('fa-tired','"\f5c8"'),
('fa-toggle-off','"\f204"'),
('fa-toggle-on','"\f205"'),
('fa-toolbox','"\f552"'),
('fa-tooth','"\f5c9"'),
('fa-trade-federation','"\f513"'),
('fa-trademark','"\f25c"'),
('fa-train','"\f238"'),
('fa-transgender','"\f224"'),
('fa-transgender-alt','"\f225"'),
('fa-trash','"\f1f8"'),
('fa-trash-alt','"\f2ed"'),
('fa-tree','"\f1bb"'),
('fa-tree-alt','"\f400"'),
('fa-trello','"\f181"'),
('fa-triangle','"\f2ec"'),
('fa-tripadvisor','"\f262"'),
('fa-trophy','"\f091"'),
('fa-trophy-alt','"\f2eb"'),
('fa-truck','"\f0d1"'),
('fa-truck-container','"\f4dc"'),
('fa-truck-couch','"\f4dd"'),
('fa-truck-loading','"\f4de"'),
('fa-truck-moving','"\f4df"'),
('fa-truck-ramp','"\f4e0"'),
('fa-tshirt','"\f553"'),
('fa-tty','"\f1e4"'),
('fa-tumblr','"\f173"'),
('fa-tumblr-square','"\f174"'),
('fa-tv','"\f26c"'),
('fa-tv-retro','"\f401"'),
('fa-twitch','"\f1e8"'),
('fa-twitter','"\f099"'),
('fa-twitter-square','"\f081"'),
('fa-typo3','"\f42b"'),
('fa-uber','"\f402"'),
('fa-uikit','"\f403"'),
('fa-umbrella','"\f0e9"'),
('fa-umbrella-beach','"\f5ca"'),
('fa-underline','"\f0cd"'),
('fa-undo','"\f0e2"'),
('fa-undo-alt','"\f2ea"'),
('fa-uniregistry','"\f404"'),
('fa-universal-access','"\f29a"'),
('fa-university','"\f19c"'),
('fa-unlink','"\f127"'),
('fa-unlock','"\f09c"'),
('fa-unlock-alt','"\f13e"'),
('fa-untappd','"\f405"'),
('fa-upload','"\f093"'),
('fa-usb','"\f287"'),
('fa-usd-circle','"\f2e8"'),
('fa-usd-square','"\f2e9"'),
('fa-user','"\f007"'),
('fa-user-alt','"\f406"'),
('fa-user-alt-slash','"\f4fa"'),
('fa-user-astronaut','"\f4fb"'),
('fa-user-check','"\f4fc"'),
('fa-user-circle','"\f2bd"'),
('fa-user-clock','"\f4fd"'),
('fa-user-cog','"\f4fe"'),
('fa-user-edit','"\f4ff"'),
('fa-user-friends','"\f500"'),
('fa-user-graduate','"\f501"'),
('fa-user-lock','"\f502"'),
('fa-user-md','"\f0f0"'),
('fa-user-minus','"\f503"'),
('fa-user-ninja','"\f504"'),
('fa-user-plus','"\f234"'),
('fa-user-secret','"\f21b"'),
('fa-user-shield','"\f505"'),
('fa-user-slash','"\f506"'),
('fa-user-tag','"\f507"'),
('fa-user-tie','"\f508"'),
('fa-user-times','"\f235"'),
('fa-users','"\f0c0"'),
('fa-users-cog','"\f509"'),
('fa-ussunnah','"\f407"'),
('fa-utensil-fork','"\f2e3"'),
('fa-utensil-knife','"\f2e4"'),
('fa-utensil-spoon','"\f2e5"'),
('fa-utensils','"\f2e7"'),
('fa-utensils-alt','"\f2e6"'),
('fa-vaadin','"\f408"'),
('fa-vector-square','"\f5cb"'),
('fa-venus','"\f221"'),
('fa-venus-double','"\f226"'),
('fa-venus-mars','"\f228"'),
('fa-viacoin','"\f237"'),
('fa-viadeo','"\f2a9"'),
('fa-viadeo-square','"\f2aa"'),
('fa-vial','"\f492"'),
('fa-vials','"\f493"'),
('fa-viber','"\f409"'),
('fa-video','"\f03d"'),
('fa-video-plus','"\f4e1"'),
('fa-video-slash','"\f4e2"'),
('fa-vimeo','"\f40a"'),
('fa-vimeo-square','"\f194"'),
('fa-vimeo-v','"\f27d"'),
('fa-vine','"\f1ca"'),
('fa-vk','"\f189"'),
('fa-vnv','"\f40b"'),
('fa-volleyball-ball','"\f45f"'),
('fa-volume-down','"\f027"'),
('fa-volume-mute','"\f2e2"'),
('fa-volume-off','"\f026"'),
('fa-volume-up','"\f028"'),
('fa-vuejs','"\f41f"'),
('fa-walking','"\f554"'),
('fa-wallet','"\f555"'),
('fa-warehouse','"\f494"'),
('fa-warehouse-alt','"\f495"'),
('fa-watch','"\f2e1"'),
('fa-weebly','"\f5cc"'),
('fa-weibo','"\f18a"'),
('fa-weight','"\f496"'),
('fa-weight-hanging','"\f5cd"'),
('fa-weixin','"\f1d7"'),
('fa-whatsapp','"\f232"'),
('fa-whatsapp-square','"\f40c"'),
('fa-wheelchair','"\f193"'),
('fa-whistle','"\f460"'),
('fa-whmcs','"\f40d"'),
('fa-wifi','"\f1eb"'),
('fa-wikipedia-w','"\f266"'),
('fa-window','"\f40e"'),
('fa-window-alt','"\f40f"'),
('fa-window-close','"\f410"'),
('fa-window-maximize','"\f2d0"'),
('fa-window-minimize','"\f2d1"'),
('fa-window-restore','"\f2d2"'),
('fa-windows','"\f17a"'),
('fa-wine-glass','"\f4e3"'),
('fa-wine-glass-alt','"\f5ce"'),
('fa-wix','"\f5cf"'),
('fa-wolf-pack-battalion','"\f514"'),
('fa-won-sign','"\f159"'),
('fa-wordpress','"\f19a"'),
('fa-wordpress-simple','"\f411"'),
('fa-wpbeginner','"\f297"'),
('fa-wpexplorer','"\f2de"'),
('fa-wpforms','"\f298"'),
('fa-wrench','"\f0ad"'),
('fa-x-ray','"\f497"'),
('fa-xbox','"\f412"'),
('fa-xing','"\f168"'),
('fa-xing-square','"\f169"'),
('fa-y-combinator','"\f23b"'),
('fa-yahoo','"\f19e"'),
('fa-yandex','"\f413"'),
('fa-yandex-international','"\f414"'),
('fa-yelp','"\f1e9"'),
('fa-yen-sign','"\f157"'),
('fa-yoast','"\f2b1"'),
('fa-youtube','"\f167"'),
('fa-youtube-square','"\f431"');