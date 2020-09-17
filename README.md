# "Diffie Hellman commerce encoder" Алгоритм шифрования в вашем VPN и RDP
# Разбор алгоритма. Авторы: Андрей Александрович Чекмарёв и Руслан Михайлович Пегов.
    Андрей Чекмарёв(Исследователь безопасности):Популярный алгоритм, очень романтично описанный как передача зашифрованных данных, защищенных двумя ключами:
Пегов Руслан (Бауманский университет, преподаватель ИТМО, простое описание алгоритма):
- Алиса отправляет письмо Бобу.
- Она кладёт письмо в шкатулку, сверху вешает замок. 
- Боб получает шкатулку, но не открывает. а вешает свой замок, и отправляет обратно Алисе. 
- Алиса получает шкатулку и снимает только свой замок. 
- Боб получает шкатулку и снимает свой замок и читает расшифрованное сообщение.

    Андрей Чекмарёв(Исследователь безопасности, в т.ч бывший студент ИТМО):Звучит романтично, даже мило. Но в нашем суровом мире, дела обстоят совсем не так романтично. Повесить второй замок - означает следующее. Боб шифрует пакет поверх шифрования Алисы. Алиса получив пакет от Боба расшифровывает пакет своим ключом, поверх шифрования Боба. Для тех кто знаком с двоичной математикой, не остаётся сомнений, что это позволяет сделать только операция XOR, или исключающее или. Далее не трудно догадаться, что гоняя один и тот же пакет туда и обратно несколько раз, мы получаем разницу (Числовое отличие оригинала от зашифрованного). Нарисую подробнее:
- Транзакция 1: Алиса шлёт письмо Бобу (Зашифровано ключом Алисы).
- Транзакция 2: Боб шлёт письмо Алисе (Зашифровано ключом Алисы и  ключом Боба).
- Транзакция 3: Алиса шлёт письмо снова Бобу (Зашифровано ключом Боба. Ключ Алисы снят Алисой).
- Находясь на роутере, между этими двумя персонажами (а это к примеру оператор СМС, или мессенджер, интернет провайдер, злоумышленник фишингом подменивший IP роутера в Макдональдсе) Мы можем проделать следующие действия:

    Записываем в буффер транзакцию 1.
- Во время второй транзакции, делаем Транзакция_1 XOR Транзакция_2. 
Результатом является перехваченный ключ Боба.
- Во время третьей транзакции, делаем: Транзакция_2 XOR Транзакция_3. 
Результатом является перехваченный ключ Алисы. 

    Далее 2 варианта:
- 1: Первый, более тяжелый: 2 операции на 1 байт: Транзакция 2 XOR Ключ Алисы XOR Ключ Боба. 
Получаем содержимое пакета. 
- 2: Второй, даже более легкий  для компьютера, чем отправка сообщения которую выполняет мессенджер Боба или Алисы: 1 операция на 1 байт. 
Транзакция_1 XOR Ключ Алисы. Результат - содержимое пакета.
- 3: Третий вариант, домашнее задание, если вы поняли этот текст, записать его не составит труда. 

    Безусловно, органы правопорядка должны контролировать граждан. Кругом куча маньяков. Но, у многих тех кто не тратил всю жизнь на поиск и реализацию того, что является коммерческой тайной, очень хорошо идут дела, а те кто тратил жизнь и заслужил результат, незаслуженно умирают в нищите. Возьмём к примеру Латвийский опыт: Полис, Янис. Наберите в Гугле, кто такой и как умер. Думаю у старшего поколения, на лоб очки уедут. 

    Совет от команды Радиокреатор: 
- Никогда не отправляйте одинаковые данные дважды между источником и приёмником. Это не безопасно. 
- Будьте хорошим человеком. Это необходимо.
- Учитесь, пока это ещё актуально. 
Начать путь, бросая яблоко с Пизантской башни, живя к примеру в окончательно отсталой стране, это слишком сложно. Но многие народы готовы и на это, тк не имея конкурентноспособных знаний, единственное на что они годятся - это являться биологическим объектом для испытаний средств от глистов. Есть страны которые конкурируют за эту привилегию.

И что, шифрование невозможно?
- А.Ч: Вовсе нет. Шифрование - это  добавление разницы к полученной строке. В любом случае, расшифрованную строку нельзя принимать как доказательство в суде, тк для любой строки, можно найти такую разницу, прибавив которую, мы получим фильм Звёздные войны.  Самый простой алгоритм для этого, взять и вычесть нашу строку из байткода фильма, таким образом, мы получим ключь, для расшифровки строки в фильм. Это надо понимать. Если вы не подтверждаете подлинность пароля или ключа, доказательств того что на выходе ваша строка, нет.

В случае же тройной передачи (Diffie Helman итд), данные расшифровываются однозначно, и могут быть приняты судом как доказательство. Видимо так надо, чтобы небыло бардака и вседозволенности в интернете.

- И что, теперь нельзя передать данные, анонимно?

- А.Ч: Вовсе нет. Любую нишу, имеющую потребность, занимают поставщики. Хороший алгоритм, обеспечивающий защиту передаваемых данных, например - это обсфуркация, в ТОР Браузере. И подобных программ и алгоритмов навалом. Просто  стоит помнить, что если вы просто пользуетесь интернетом, стоит соблюдать законы и правила, тк всё что вы передали по сети, может быть использовано, как доказательство того, что это было передано по сети, в суде. Вами или нет, тут уже только ваша честность ключь к разгадке.

    Всем хорошего дня, и актуальных знаний.
Вставки помеченные другими авторами, принадлежат этим авторам.
Правки по орфографии и пунктуации приветствуются.
