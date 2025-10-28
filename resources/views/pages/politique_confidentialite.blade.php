@extends('layouts.master')
@section('meta')
    <title>Le Carnot –  Fast Food Gourmand à Le Neubourg  </title>
    <meta name="description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta name="keywords"
        content="4 fromages,Régina,La Le Carnot,Suprême,Cheddar,Végétarienne,Classico,Fruits de mer,Maxi,Tomate,Mozzarella,merguez,viande hachée,origan,oignon rouge,Burrata,Sevilla,Hyptnotika,pizzas savoureuses,pizza maison,livraison rapide,pâte fraîche,pizzas spéciales,pizzas gourmandes">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Le Carnot –  Fast Food Gourmand à Le Neubourg  ">
    <meta property="og:description"
        content="Chez Le Carnot, partagez un moment convivial autour de burgers, tacos, pizzas et sandwichs faits maison. Des recettes généreuses et une ambiance chaleureuse au cœur du Neubourg !">
    <meta property="og:image" content="{{ asset('img/pizza.webp') }}">
@endsection
@section('content')
    <section class="breadcrumb m_0">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1 class="title title-h1">POLITIQUE DE CONFIDENTIALITÉ</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="  df__pt df__pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb_20">

                    <h5 class="title title-5 mb_10"> ARTICLE 1 : PRÉAMBULE </h5>
                    <p class="text-color"> Cette politique de confidentialité s'applique au site <a class="href-color"
                            href="/" class=""><strong>{{ $_SERVER['HTTP_HOST'] }}</strong></a></p>
                    <p class="text-color"> La présente politique de confidentialité a pour but d'exposer aux
                        utilisateurs du site :
                    </p>
                    <ul>
                        <li class="text-color">La manière dont sont collectées et traitées leurs données à caractère
                            personnel. Doivent
                            être considérées comme données personnelles toutes les données étant susceptibles
                            d'identifier un utilisateur. Il s'agit notamment du prénom et du nom, de l'âge, de
                            l'adresse postale, l'adresse mail, la localisation de l'utilisateur ou encore son
                            adresse IP ; </li>
                        <li class="text-color"> Quels sont les droits des utilisateurs concernant ces données ; </li>
                        <li class="text-color">Qui est responsable du traitement des données à caractère personnel
                            collectées et
                            traitées ; </li>
                        <li class="text-color">A qui ces données sont transmises ; </li>
                        <li class="text-color">Eventuellement, la politique du site en matière de fichiers "cookies".</li>
                    </ul>

                </div>
                <div class="col-md-12 mb_20">

                    <h5 class="title title-5 mb_10"> ARTICLE 2 : PRINCIPES GÉNÉRAUX EN MATIÈRE DE COLLECTE ET DE
                        TRAITEMENT DE
                        DONNÉES </h5>
                    <p class="text-color"> Conformément aux dispositions de l'article 5 du Règlement européen
                        2016/679, la collecte et
                        le traitement des données des utilisateurs du site respectent les principes suivants : </p>
                    <ul>
                        <li class="text-color">Licéité, loyauté et transparence : les données ne peuvent être collectées et
                            traitées
                            qu'avec le consentement de l'utilisateur propriétaire des données. A chaque fois que des
                            données à caractère personnel seront collectées, il sera indiqué à l'utilisateur que ses
                            données sont collectées, et pour quelles raisons ses données sont collectées ; </li>
                        <li class="text-color">Finalités limitées : la collecte et le traitement des données sont exécutés
                            pour
                            répondre à un ou plusieurs objectifs déterminés dans les présentes conditions générales
                            d’utilisation ; </li>
                        <li class="text-color">Minimisation de la collecte et du traitement des données : seules les données
                            nécessaires à la bonne exécution des objectifs poursuivis par le site sont collectées ;
                        </li>
                        <li class="text-color">Conservation des données réduites dans le temps : les données sont conservées
                            pour une
                            durée limitée, dont l'utilisateur est informé. Lorsque cette information ne peut pas
                            être communiquée, l'utilisateur est informé des critères utilisés pour déterminer la
                            durée de conservation ; </li>
                        <li class="text-color">Intégrité et confidentialité des données collectées et traitées : le
                            responsable du
                            traitement des données s'engage à garantir l'intégrité et la confidentialité des données
                            collectées. </li>
                    </ul>

                </div>
                <div class="col-md-12 mb_20">

                    <p class="text-color"> Afin d'être licites, et ce conformément aux exigences de l'article 6 du
                        règlement européen
                        2016/679, la collecte et le traitement des données à caractère personnel ne pourront
                        intervenir que s'ils respectent au moins l'une des conditions ci-après énumérées : </p>
                    <ul>
                        <li class="text-color">L'utilisateur a expressément consenti au traitement ; </li>
                        <li class="text-color">Le traitement est nécessaire à la bonne exécution d'un contrat ; </li>
                        <li class="text-color">Le traitement répond à une obligation légale ; </li>
                        <li class="text-color">Le traitement s'explique par une nécessité liée à la sauvegarde des intérêts
                            vitaux de
                            la personne concernée ou d'une autre personne physique ; </li>
                        <li class="text-color">Le traitement peut s'expliquer par une nécessité liée à l'exécution d'une
                            mission
                            d'intérêt public ou qui relève de l'exercice de l'autorité publique ; </li>
                        <li class="text-color">Le traitement et la collecte des données à caractère personnel sont
                            nécessaires aux fins
                            des intérêts légitimes et privés poursuivis par le responsable du traitement ou par un
                            tiers. </li>
                    </ul>

                </div>
                <div class="col-md-12 mb_20">

                    <h5 class="title title-5 mb_10"> ARTICLE 3 : DONNÉES À CARACTÈRE PERSONNEL COLLECTÉES ET
                        TRAITÉES DANS LE
                        CADRE DE LA NAVIGATION SUR LE SITE </h5>
                    <p class="text-color"><strong>A. DONNÉES COLLECTÉES ET TRAITÉES ET MODE DE COLLECTE</strong>
                    </p>
                    <p class="text-color"> Les données à caractère personnel collectées sur le site Le Carnot sont les
                        suivantes :
                    </p>
                    <p class="text-color"> Informations que l'utilisateur transmet à Le Carnot directement ou
                        indirectement, à savoir
                        : </p>
                    <ul class="list-tire">
                        <li class="text-color">Données d'inscription. </li>
                        <li class="text-color">Données provenant du profil utilisateur. </li>
                        <li class="text-color">Données provenant du compte utilisateur. </li>
                        <li class="text-color">Informations supplémentaires que l'utilisateur veut partager. </li>
                        <li class="text-color">Données d'utilisations. </li>
                        <li class="text-color">Données de base. </li>
                        <li class="text-color">Données de géolocalisation. </li>
                    </ul>
                    <p class="text-color">Par ailleurs, lors d'un paiement sur le site, ces informations seront
                        conservées dans les
                        systèmes informatiques de l'éditeur du site une preuve de la transaction comprenant le bon
                        de commande et la facture.</p>
                    <p class="text-color">Le responsable du traitement conservera dans ses systèmes informatiques
                        du site et dans des
                        conditions raisonnables de sécurité l'ensemble des données collectées pour une durée de : 24
                        mois depuis sa dernière interaction avec la Plateforme.</p>
                    <p class="text-color"><strong>B. TRANSMISSION DES DONNÉES A DES TIERS</strong></p>
                    <p class="text-color">Les données à caractère personnel collectées par le site ne sont
                        transmises à aucun tiers, et
                        ne sont traitées que par l'éditeur du site.</p>
                    <p class="text-color"><strong>C. HÉBERGEMENT DES DONNÉES</strong></p>
                    <p class="text-color"> Le site Le Carnot est hébergé par : OVH (shared hosting), dont le siège est
                        situé à
                        l'adresse
                        ci-après : 2 rue Kellermann - 59100 Roubaix - France. </p>
                    <p class="text-color"> Les données sont hébergées en france cat le siège social de la société
                        s'y situe. </p>

                </div>
                <div class="col-md-12 mb_20">

                    <h5 class="title title-5 mb_10"> ARTICLE 4 : RESPONSABLE DU TRAITEMENT DES DONNÉES </h5>
                    <p class="text-color"><strong> A. LE RESPONSABLE DU TRAITEMENT DES DONNÉES </strong></p>
                    <p class="text-color"> Le responsable du traitement des données est chargé de déterminer les
                        finalités et les
                        moyens mis au service du traitement des données à caractère personnel. </p>
                    <p class="text-color"><strong> B. OBLIGATIONS DU RESPONSABLE DU TRAITEMENT DES DONNÉES
                        </strong></p>
                    <p class="text-color"> Le responsable du traitement s'engage à protéger les données à caractère
                        personnel
                        collectées, à ne pas les transmettre à des tiers sans que l'utilisateur n'en ait été informé
                        et à respecter les finalités pour lesquelles ces données ont été collectées. </p>
                    <p class="text-color"> Le site dispose d'un certificat SSL afin de garantir que les
                        informations et le transfert
                        des données transitant par le site sont sécurisés. </p>
                    <p class="text-color"> Un certificat SSL ("Secure Socket Layer" Certificate) a pour but de
                        sécuriser les données
                        échangées entre l'utilisateur et le site. </p>
                    <p class="text-color"> De plus, le responsable du traitement des données s'engage à notifier
                        l'utilisateur en cas
                        de rectification ou de suppression des données, à moins que cela n'entraîne pour lui des
                        formalités, coûts et démarches disproportionnés. </p>
                    <p class="text-color"> Dans le cas où l'intégrité, la confidentialité ou la sécurité des
                        données à caractère
                        personnel de l'utilisateur est compromise, le responsable du traitement s'engage à informer
                        l'utilisateur par tout moyen. </p>

                </div>
                <div class="col-md-12 mb_20">

                    <h5 class="title title-5 mb_10"> ARTICLE 5 : DROITS DE L'UTILISATEUR </h5>
                    <p class="text-color"> Conformément à la réglementation concernant le traitement des données à
                        caractère personnel,
                        l'utilisateur possède les droits ci-après énumérés. </p>
                    <p class="text-color"> Afin que le responsable du traitement des données fasse droit à sa
                        demande, l'utilisateur
                        est tenu de lui communiquer : ses prénom et nom ainsi que son adresse e-mail, et si cela est
                        pertinent, son numéro de compte ou d'espace personnel ou d'abonné. </p>
                    <p class="text-color">Le responsable du traitement des données est tenu de répondre à
                        l'utilisateur dans un délai
                        de 30 (trente) jours maximum.</p>
                    <p class="text-color"><strong>A. PRÉSENTATION DES DROITS DE L'UTILISATEUR EN MATIÈRE DE
                            COLLECTE ET TRAITEMENT DE
                            DONNÉES</strong></p>
                    <p class="text-color"><span class="sous-titre"> a. Droit d'accès, de rectification et droit à
                            l'effacement </span>
                    </p>
                    <p class="text-color"> L'utilisateur peut prendre connaissance, mettre à jour, modifier ou
                        demander la suppression
                        des données le concernant, en respectant la procédure ci-après énoncée :</p>
                    <p class="text-color"> En s'enregistrant, l'Utilisateur devra fournir quelques données pour la
                        création de son
                        profil. D'une part, en ce qui concerne les Clients, ils devront fournir les données
                        suivantes : nom d'utilisateur, numéro de téléphone, email. </p>
                    <p class="text-color"> Quand l'enregistrement est complété, tout Utilisateur pourra accéder à
                        son profil et le
                        compléter et/ou l'éditer selon ses préférences. L'Utilisateur pourra accéder et créer un
                        compte à travers son profil de Facebook. </p>
                    <p class="text-color"> L'information et les données fournies par l'Utilisateur seront à tous
                        moments disponibles
                        sur son compte d'utilisateur et pourront être modifiées par l'Utilisateur à travers l'option
                        « éditer profil ». </p>
                    <p class="text-color"> L'Utilisateur s'engage à saisir des données réelles et véraces. De plus,
                        il sera le seul
                        responsable des dommages et préjudices que Le Carnot, ou l'une de ses filiales,
                        ou des
                        tiers puissent souffrir suite au manque de véracité, inexactitude, manque de validité et
                        d'authenticité des données fournies. </p>
                    <p class="text-color"> S'il en possède un, l'utilisateur a le droit de demander la suppression
                        de son espace
                        personnel en suivant la procédure suivante : </p>
                    <p class="text-color"> L'utilisateur devra prendre contact avec notre service client afin de
                        s'assurer de son
                        identité et de procéder à la suppression de son compte selon le règlement en vigueur. </p>
                    <p class="text-color"><span class="sous-titre"> b. Droit à la limitation et à l'opposition du
                            traitement des
                            données </span></p>
                    <p class="text-color"> L'utilisateur a le droit de demander la limitation ou de s'opposer au
                        traitement de ses
                        données par le site, sans que le site ne puisse refuser, sauf à démontrer l'existence de
                        motifs légitimes et impérieux, pouvant prévaloir sur les intérêts et les droits et libertés
                        de l'utilisateur.</p>
                    <p class="text-color">Afin de demander la limitation du traitement de ses données ou de
                        formuler une opposition au
                        traitement de ses données, l'utilisateur doit suivre la procédure suivante :</p>
                    <p class="text-color">L'utilisateur doit faire une demande de limitation au traitement de ses
                        données personnelles
                        par e- mail auprès du responsable.</p>
                    <p class="text-color"><span class="sous-titre"> c.Droit de ne pas faire l'objet d'une décision
                            fondée exclusivement
                            sur un procédé automatisé </span></p>
                    <p class="text-color"> Conformément aux dispositions du règlement 2016/679, l'utilisateur a le
                        droit de ne pas
                        faire l'objet d'une décision fondée exclusivement sur un procédé automatisé si la décision
                        produit des effets juridiques le concernant, ou l'affecte de manière significative de façon
                        similaire. </p>
                    <p class="text-color"><span class="sous-titre"> d. Droit de déterminer le sort des données
                            après la mort </span>
                    </p>
                    <p class="text-color">Il est rappelé à l'utilisateur qu'il peut organiser quel doit être le
                        devenir de ses données
                        collectées et traitées s'il décède, conformément à la loi n°2016-1321 du 7 octobre 2016.</p>
                    <p class="text-color"><span class="sous-titre"> e. Droit de saisir l'autorité de contrôle
                            compétente </span></p>
                    <p class="text-color">Dans le cas où le responsable du traitement des données décide de ne pas
                        répondre à la
                        demande de l'utilisateur, et que l'utilisateur souhaite contester cette décision, ou, s'il
                        pense qu'il est porté atteinte à l'un des droits énumérés ci-dessus, il est en droit de
                        saisir la CNIL (Commission Nationale de l'Informatique et des Libertés, <a class="href-color"
                            href="https://www.cnil.fr">https://www.cnil.fr</a> ) ou tout juge compétent.</p>
                    <p class="text-color"><strong>B. DONNÉES PERSONNELLES DES PERSONNES MINEURES</strong></p>
                    <p class="text-color"> Conformément aux dispositions de l'article 8 du règlement européen
                        2016/679 et à la loi
                        Informatique et Libertés, seuls les mineurs âgés de 15 ans ou plus peuvent consentir au
                        traitement de leurs données personnelles. </p>
                    <p class="text-color">Si l'utilisateur est un mineur de moins de 15 ans, l'accord d'un
                        représentant légal sera
                        requis afin que des données à caractère personnel puissent être collectées et traitées. </p>
                    <p class="text-color">L'éditeur du site se réserve le droit de vérifier par tout moyen que
                        l'utilisateur est âgé de
                        plus de 15 ans, ou qu'il aura obtenu l'accord d'un représentant légal avant de naviguer sur
                        le site. </p>

                </div>
                <div class="col-md-12 mb_20">
                    <h5 class="title title-5 mb_10"> ARTICLE 6 : UTILISATION DES FICHIERS "COOKIES" </h5>
                    <p class="text-color"> Le site a éventuellement recours aux techniques de "cookies".</p>
                    <p class="text-color"> Un "cookie" est un fichier de petite taille (moins de 4 ko), stocké par
                        le site sur le
                        disque dur de l'utilisateur, contenant des informations relatives aux habitudes de
                        navigation de l'utilisateur.</p>
                    <p class="text-color"> Ces fichiers lui permettent de traiter des statistiques et des
                        informations sur le trafic,
                        de faciliter la navigation et d'améliorer le service pour le confort de l'utilisateur.</p>
                    <p class="text-color"> Pour l'utilisation de fichiers "cookies" impliquant la sauvegarde et
                        l'analyse de données à
                        caractère personnel, le consentement de l'utilisateur est nécessairement demandé.</p>
                    <p class="text-color"> Ce consentement de l'utilisateur est considéré comme valide pour une
                        durée de 6 (six) mois
                        maximum. A l'issue de cette période, le site demandera à nouveau l'autorisation de
                        l'utilisateur pour enregistrer des fichiers "cookies" sur son disque dur.</p>
                    <p class="text-color"> La présente politique de confidentialité a pour but d'exposer aux
                        utilisateurs du site :
                    </p>
                    <p class="text-color"><span class="sous-titre"> a. Opposition de l'utilisateur à
                            l'utilisation de fichiers
                            "cookies" par le site </span></p>
                    <p class="text-color">Les cookies non essentiels au fonctionnement du site ne sont déposés sur
                        le terminal de
                        l'utilisateur qu'après avoir obtenu son consentement. L'utilisateur peut retirer son
                        consentement à tout moment, de la manière suivante :</p>
                    <p class="text-color"> L'utilisateur peut apporter toutes les modifications souhaitées via le
                        centre des
                        préférences. Cependant, le blocage de certains types de cookies peut affecter votre
                        expérience de nos sites web et de notre application et les services que nous pouvons
                        fournir. Nous configurerons toujours les cookies pour qu'ils se souviennent de votre choix
                        et autres cookies techniques nécessaires. </p>
                    <p class="text-color"> De manière plus générale, il est porté à la connaissance de
                        l'utilisateur qu'il peut
                        s'opposer à l'enregistrement de ces fichiers "cookies" en configurant son logiciel de
                        navigation. </p>
                    <p class="text-color">Pour information, l'utilisateur peut trouver aux adresses suivantes les
                        démarches à suivre
                        afin de configurer son logiciel de navigation pour s'opposer à l'enregistrement des fichiers
                        « cookies » :</p>
                    <ul>
                        <li class="text-color"><strong>Chrome</strong>: <a class="href-color"
                                href="https://support.google.com/accounts/answer/61416?hl=fr">https://support.google.com/accounts/answer/61416?hl=fr</a>
                        </li>
                        <li class="text-color"><strong>Firefox</strong>: <a class="href-color"
                                href="https://support.mozilla.org/fr/kb/enable-and-disable-cookies-website-preferences">https://support.mozilla.org/fr/kb/enable-and-disable-cookies-website-preferences
                            </a></li>
                        <li class="text-color"><strong>Safari</strong>: <a class="href-color"
                                href="http://www.apple.com/legal/privacy/fr-ww/">http://www.apple.com/legal/privacy/fr-ww/</a>
                        </li>
                        <li class="text-color"><strong>Internet Explorer</strong>: <a class="href-color"
                                href="https://support.microsoft.com/fr-fr/help/17442/windows-internet-explorer-delete-manage-cookies">https://support.microsoft.com/fr-fr/help/17442/windows-internet-explorer-delete-manage-cookies</a>
                        </li>
                        <li class="text-color"><strong>Opera</strong>: <a class="href-color"
                                href=" http://www.opera.com/help/tutorials/security/cookies/">
                                http://www.opera.com/help/tutorials/security/cookies/</a></li>
                    </ul>
                    <p class="text-color">Dans le cas où l'utilisateur décide de désactiver les fichiers
                        "cookies", il pourra
                        poursuivre sa navigation sur le site. Toutefois, tout dysfonctionnement du site provoqué par
                        cette manipulation ne pourrait être considéré comme étant du fait de l'éditeur du site.</p>
                    <p class="text-color"><span class="sous-titre"> b. Description des fichiers "cookies"
                            utilisés par le site</span>
                    </p>
                    <p class="text-color"> L'éditeur du site attire l'attention de l'utilisateur sur le fait que
                        des cookies sont
                        utilisés lors de sa navigation. </p>
                    <p class="text-color"> En naviguant sur le site, il est porté à connaissance de l'utilisateur
                        que des fichiers
                        "cookies" de tiers peuvent être enregistrés.</p>
                    <p class="text-color"> Il s'agit plus particulièrement des tiers suivants :</p>
                    <ul>
                        <li class="text-color">Fournisseurs de logiciel </li>
                        <li class="text-color"> Partenaires de mise en œuvre </li>
                        <li class="text-color">Fournisseurs de services de paiement et de carte </li>
                        <li class="text-color"> Entreprises chargées d'enquêtes de satisfaction client </li>
                        <li class="text-color"> Partenaires de la boutique de fidélité </li>
                        <li class="text-color"> Conseillers professionnels </li>
                        <li class="text-color"> Forces de l'ordre, organismes de réglementation et/ou agences
                            gouvernementales </li>
                        <li class="text-color"> Acheteurs potentiels </li>
                        <li class="text-color"> Tout autre tiers, à condition que vous ayez donné votre consentement à
                            la divulgation.
                        </li>
                    </ul>
                    <p class="text-color"> De plus, le site intègre des boutons de réseaux sociaux, permettant à
                        l'utilisateur de
                        partager son activité sur le site. Des fichiers "cookies" de ces réseaux sociaux sont par
                        conséquent susceptibles d'être stockés sur l'ordinateur de l'utilisateur lorsqu'il utilise
                        ces fonctionnalités. </p>
                    <p class="text-color"> L'attention de l'utilisateur est portée sur le fait que ces sites
                        disposent de politiques de
                        confidentialité propres et de conditions générales d'utilisation possiblement différentes du
                        site. L'éditeur du site invite les utilisateurs à consulter les politiques de
                        confidentialité et les conditions générales d'utilisation de ces sites. </p>

                </div>
                <div class="col-md-12 mb_20">

                    <h5 class="title title-5 mb_10"> ARTICLE 7 : CONDITIONS DE MODIFICATION DE LA POLITIQUE DE
                        CONFIDENTIALITÉ
                    </h5>
                    <p class="text-color"> La présente politique de confidentialité peut être consultée à tout
                        moment à l'adresse
                        ci-après indiquée : </p>
                    <p class="text-color"><a class="href-color" aria-current="page" href="/politique-de-confidentialite"
                            class="router-link-active router-link-exact-active">
                            <strong>{{ $_SERVER['HTTP_HOST'] }}/politique-de-confidentialité</strong>.</a></p>
                    <p class="text-color"> L'éditeur du site se réserve le droit de la modifier afin de garantir
                        sa conformité avec le
                        droit en vigueur. </p>
                    <p class="text-color">Par conséquent, l'utilisateur est invité à venir consulter régulièrement
                        cette politique de
                        confidentialité afin de se tenir informé des derniers changements qui lui seront apportés.
                    </p>
                    <p class="text-color">Toutefois, en cas de modification substantielle de cette politique,
                        l'utilisateur en sera
                        informé de la manière suivante :</p>
                    <p class="text-color">Par e-mail à l'adresse communiquée par l'utilisateur.</p>
                    <p class="text-color">Il est porté à la connaissance de l'utilisateur que la dernière mise à
                        jour de la présente
                        politique de confidentialité est intervenue le : 30/12/2022.</p>

                </div>
            </div>
        </div>
    </section>
@endsection
