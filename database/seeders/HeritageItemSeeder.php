<?php

namespace Database\Seeders;

use App\Models\HeritageItem;
use Illuminate\Database\Seeder;

class HeritageItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // --- Original Items ---
            [
                'name' => 'Kathak',
                'category' => 'dance',
                'state' => 'Uttar Pradesh',
                'short_desc' => 'One of the eight major forms of Indian classical dance, originating from the nomadic bards of ancient northern India.',
                'long_desc' => "Kathak is one of the most captivating classical dance forms of India, tracing its origins to the nomadic bards of ancient North India, known as Kathakars or storytellers. The word 'Kathak' is derived from the Sanskrit word 'Katha' meaning story. These storytellers communicated stories from the great epics and ancient mythology through dance, songs, and music.\n\nOver centuries, Kathak evolved significantly, absorbing influences from both Hindu and Muslim cultures. During the Bhakti movement, it was performed in temples as a devotional practice, depicting tales of Lord Krishna and Radha. Later, under the Mughal era, the dance form moved to the royal courts, where it acquired a more sophisticated, secular character with elaborate footwork and spins (chakkars).\n\nKathak is distinguished by its intricate footwork adorned with ankle bells (ghungroos), fast spins, and expressive gestures. The dance seamlessly blends elements of Hindu and Muslim artistic traditions, making it unique among Indian classical dance forms. Today, three major gharanas (schools) of Kathak — Lucknow, Jaipur, and Banaras — continue to flourish, each with its own distinctive style and emphasis.",
                'status' => 'approved',
            ],
            [
                'name' => 'Diwali',
                'category' => 'festival',
                'state' => 'Pan India',
                'short_desc' => 'The Festival of Lights, one of the most significant Hindu festivals celebrated across the entire subcontinent.',
                'long_desc' => "Diwali, or Deepavali, literally meaning 'a row of lights,' is one of the most cherished and widely celebrated festivals in India. This five-day festival of lights symbolizes the spiritual victory of light over darkness, good over evil, and knowledge over ignorance.\n\nThe festival is rooted in several mythological narratives. In North India, it celebrates Lord Rama's return to Ayodhya after 14 years of exile and his victory over the demon king Ravana. In South India, it marks Lord Krishna's defeat of the demon Narakasura. In Bengal, the festival is dedicated to Goddess Kali. Jains celebrate it as the day Lord Mahavira attained moksha.\n\nDuring Diwali, homes are cleaned and decorated with rangoli (colorful floor patterns), diyas (oil lamps), and candles. Families gather for puja (prayer ceremonies), particularly to Goddess Lakshmi, the deity of wealth and prosperity. The night sky lights up with fireworks, and people exchange gifts, sweets, and warm wishes. Markets bustle with shoppers buying new clothes, jewelry, and decorative items.\n\nDiwali also marks the beginning of the new financial year for many Indian businesses, symbolizing new beginnings and the hope for prosperity in the coming year.",
                'status' => 'approved',
            ],
            [
                'name' => 'Madhubani Painting',
                'category' => 'art',
                'state' => 'Bihar',
                'short_desc' => 'A traditional art form from the Mithila region of Bihar, known for its vibrant geometric patterns and mythological themes.',
                'long_desc' => "Madhubani painting, also known as Mithila painting, is a style of Indian painting practiced in the Mithila region of Bihar. This ancient art form has been passed down through generations, traditionally by women, who painted the walls and floors of their homes during festivals, religious events, and special occasions like weddings.\n\nThe name 'Madhubani' literally translates to 'forests of honey,' referring to the town in Bihar where this art form flourished. The paintings are characterized by their eye-catching geometrical patterns, vibrant use of color, and depiction of nature and Hindu mythological scenes.\n\nTraditionally, Madhubani paintings use natural dyes and pigments extracted from plants. The colors are derived from turmeric (yellow), indigo (blue), flowers (red), leaves (green), and lamp soot (black). The paintings are done using fingers, twigs, brushes, nib-pens, and matchsticks, on handmade paper, canvas, or cloth.\n\nThe art form encompasses five distinctive styles: Bharni, Katchni, Tantrik, Godna, and Kohbar. Each style has its own unique characteristics — Bharni uses filled, colorful patterns; Katchni employs fine line work; Tantrik features religious themes; Godna mirrors tattoo designs of the lower castes; and Kohbar depicts wedding scenes.\n\nIn 2003, Madhubani painting received a Geographical Indication (GI) tag, recognizing it as a unique cultural product of the Mithila region.",
                'status' => 'approved',
            ],
            [
                'name' => 'Biryani',
                'category' => 'cuisine',
                'state' => 'Telangana',
                'short_desc' => 'A rich, aromatic rice dish layered with spiced meat, saffron, and herbs — a crown jewel of Hyderabadi cuisine.',
                'long_desc' => "Biryani is one of India's most celebrated culinary masterpieces, with the Hyderabadi version being among the most famous worldwide. This aromatic dish of layered rice and meat is a perfect testament to the rich culinary heritage that evolved in the royal kitchens of the Nizams of Hyderabad.\n\nHyderabadi Biryani is believed to have originated when Mughal emperor Aurangzeb's son, Nizam-ul-Mulk, established the Asaf Jahi dynasty in Hyderabad in 1724. The royal chefs blended Mughlai cooking techniques with the local Andhra cuisine, creating a distinctive style that set Hyderabadi Biryani apart.\n\nThe dish follows the 'dum' method of cooking — raw marinated meat and partially cooked basmati rice are layered in a heavy-bottomed pot (handi), sealed with dough, and slow-cooked over a low flame. This technique allows the flavors to meld beautifully while the steam cooks everything to perfection.\n\nKey ingredients include premium basmati rice, tender meat (traditionally goat), yogurt, fried onions, saffron, mint, coriander, and a carefully balanced blend of spices including cardamom, cinnamon, bay leaves, and star anise. The result is a dish where every grain of rice is infused with aromatic flavors.\n\nBiryani is not just food in Hyderabad — it's an emotion, a cultural identity, and a source of immense pride for the city's residents.",
                'status' => 'approved',
            ],
            [
                'name' => 'Taj Mahal',
                'category' => 'monument',
                'state' => 'Uttar Pradesh',
                'short_desc' => 'An ivory-white marble mausoleum and UNESCO World Heritage Site, regarded as the finest example of Mughal architecture.',
                'long_desc' => "The Taj Mahal, standing majestically on the banks of the Yamuna River in Agra, is widely considered one of the most beautiful buildings ever created. This magnificent mausoleum was commissioned in 1632 by Mughal Emperor Shah Jahan to house the tomb of his beloved wife, Mumtaz Mahal, who died during childbirth.\n\nThe construction of the Taj Mahal took approximately 22 years, employing over 20,000 artisans and craftsmen from across India, Persia, the Ottoman Empire, and Europe. The chief architect is believed to be Ustad Ahmad Lahouri, who masterfully blended elements from Islamic, Persian, Ottoman Turkish, and Indian architectural styles.\n\nThe main structure is built from luminous white marble sourced from Rajasthan, inlaid with semi-precious stones including jasper, jade, turquoise, lapis lazuli, sapphire, and carnelian in intricate floral and calligraphic patterns — a technique known as 'pietra dura.' The marble appears to change color depending on the time of day and moonlight, giving it an almost ethereal quality.\n\nThe complex spans 17 hectares and includes a mosque, a guest house, formal gardens divided into four parts by waterways (representing the four rivers of Paradise in Islamic tradition), and the iconic reflecting pool. The main dome rises to 73 meters, surrounded by four minarets that lean slightly outward — a deliberate design to protect the tomb in case of collapse.\n\nDesignated as a UNESCO World Heritage Site in 1983, the Taj Mahal was also named one of the New Seven Wonders of the World in 2007. It attracts 7-8 million visitors annually and remains India's most iconic symbol of love and architectural excellence.",
                'status' => 'approved',
            ],
            [
                'name' => 'Baul Music',
                'category' => 'music',
                'state' => 'West Bengal',
                'short_desc' => 'A mystical folk music tradition of Bengal, performed by wandering minstrels known as Bauls who seek divine truth through song.',
                'long_desc' => "Baul music is a unique and mystical form of folk music that originated in Bengal, encompassing parts of present-day West Bengal in India and Bangladesh. The Bauls are a group of wandering minstrels who have rejected organized religion and caste distinctions, instead seeking spiritual truth through music, dance, and an unconventional lifestyle.\n\nThe word 'Baul' is believed to derive from the Sanskrit 'vatula' meaning 'enlightened' or 'mad' — aptly describing these free-spirited musicians who are considered 'mad about God.' Their philosophy draws from various traditions including Vaishnavism, Sufism, Buddhism, and Tantra, creating a syncretic spiritual path that transcends religious boundaries.\n\nBaul songs, known as 'Baul Gaan,' are deeply philosophical compositions that explore themes of divine love, the human body as a temple, the search for the 'Moner Manush' (Man of the Heart), and the rejection of social norms. The lyrics are rich with metaphors, allegories, and mystical imagery.\n\nThe music is typically accompanied by a one-stringed instrument called the ektara, along with the dotara (a type of lute), duggi (small drum), and khamak (a plucked drum). The Bauls often perform with a distinctive singing and dancing style, wearing saffron or patchwork robes, symbolizing their renunciation of material attachment.\n\nRabindranath Tagore, India's Nobel laureate poet, was deeply influenced by Baul philosophy and music, incorporating their themes into many of his own compositions. In 2005, UNESCO proclaimed the Baul tradition as a 'Masterpiece of the Oral and Intangible Heritage of Humanity,' recognizing its unique cultural significance.",
                'status' => 'approved',
            ],
            [
                'name' => 'Bharatanatyam',
                'category' => 'dance',
                'state' => 'Tamil Nadu',
                'short_desc' => 'One of the oldest and most revered classical dance forms of India, originating from the temples of Tamil Nadu.',
                'long_desc' => "Bharatanatyam is one of the oldest and most widely practiced classical dance forms of India, with roots going back over 2,000 years to the temples of Tamil Nadu. The name is derived from 'Bharata' (combining Bhava — expression, Raga — melody, and Tala — rhythm) and 'Natyam' (dance).\n\nThis dance form was originally performed by Devadasis (temple dancers) as a form of worship in Hindu temples. It was codified and documented in the ancient treatise 'Natya Shastra' by sage Bharata Muni, which is considered the foundational text of Indian performing arts.\n\nBharatanatyam is characterized by its fixed upper torso, bent legs, and spectacular footwork, combined with a sophisticated vocabulary of hand gestures (mudras), facial expressions, and body movements. The dancer's feet are adorned with ankle bells (salangai), and the rhythmic patterns created are integral to the performance.\n\nA traditional Bharatanatyam recital follows a specific sequence called 'margam' — starting with Alarippu (invocation), followed by Jatiswaram (pure dance), Shabdam (expressive piece), Varnam (the centerpiece combining pure dance and expression), Padam (lyrical compositions), Tillana (energetic finale), and Mangalam (concluding prayer).\n\nIn the early 20th century, pioneers like Rukmini Devi Arundale and Balasaraswati played crucial roles in reviving and bringing Bharatanatyam from temples to concert stages, establishing it as a respected art form worldwide.",
                'status' => 'approved',
            ],
            [
                'name' => 'Holi',
                'category' => 'festival',
                'state' => 'Pan India',
                'short_desc' => 'The Festival of Colors, celebrating the triumph of good over evil and the arrival of spring across India.',
                'long_desc' => "Holi, known as the Festival of Colors, is one of India's most vibrant and joyous celebrations. Observed primarily in March, this ancient Hindu festival heralds the arrival of spring and celebrates the triumph of good over evil.\n\nThe festival has its origins in several Hindu legends. The most popular is the story of Prahlad and Holika — where the demon king Hiranyakashipu's sister Holika tried to kill the devout prince Prahlad by sitting with him in a fire, but divine intervention saved Prahlad while Holika perished. This event is commemorated the night before Holi with 'Holika Dahan' — the burning of bonfires.\n\nThe main day of Holi transforms India into a riot of colors. People of all ages take to the streets, smearing each other with colored powders (gulal) and drenching each other with colored water using water guns (pichkaris) and water balloons. Traditional celebrations also include drinking 'thandai' (a spiced milk drink sometimes infused with bhang), eating special sweets like 'gujiya,' and singing and dancing to the beats of dhol drums.\n\nOne of the most famous celebrations occurs in Mathura and Vrindavan, the legendary birthplace and playground of Lord Krishna. The 'Lathmar Holi' in Barsana, where women playfully beat men with sticks, and the flower Holi at the Banke Bihari temple are spectacular events that draw visitors from around the world.\n\nHoli is unique in its ability to dissolve social barriers — during the festival, distinctions of age, gender, caste, and class are momentarily forgotten as everyone joins in the colorful celebration.",
                'status' => 'approved',
            ],
            [
                'name' => 'Pattachitra',
                'category' => 'art',
                'state' => 'Odisha',
                'short_desc' => 'An ancient scroll painting tradition from Odisha, featuring intricate mythological narratives with rich colors and fine details.',
                'long_desc' => "Pattachitra is a traditional painting art form that has flourished in the eastern Indian state of Odisha for over a thousand years. The name is derived from the Sanskrit words 'patta' (cloth) and 'chitra' (picture), literally meaning 'cloth painting.'\n\nThis ancient art form is closely linked to the worship of Lord Jagannath at the famous Puri temple. The artists, known as 'chitrakars,' traditionally belonged to the village of Raghurajpur near Puri, which remains the primary center of Pattachitra art to this day.\n\nThe creation of a Pattachitra is a meticulous process that begins with preparing the canvas. Cotton cloth is coated with a mixture of chalk and tamarind seed gum to create a smooth, durable surface. The artists then draw intricate designs using fine brushes made from animal hair and natural colors derived from minerals, plants, and other organic sources.\n\nThe paintings are characterized by bold, detailed outlines; vivid, natural colors (red from hingula, white from conch shells, yellow from haritala, black from lamp soot); elaborate floral borders; and the distinctive large, round eyes of the figures. Common themes include depictions of Lord Jagannath, scenes from the Ramayana and Mahabharata, Krishna Leela, and the Dashavatara (ten incarnations of Lord Vishnu).\n\nPattachitra has received international recognition and a GI tag, ensuring the protection of this unique art form. The artists of Raghurajpur continue to preserve this tradition, with the village itself becoming a living heritage site.",
                'status' => 'approved',
            ],
            [
                'name' => 'Rogan Art',
                'category' => 'art',
                'state' => 'Gujarat',
                'short_desc' => 'A rare and dying art form of cloth painting using castor oil-based paints, practiced by only one family in Kutch, Gujarat.',
                'long_desc' => "Rogan art is an extraordinarily rare form of textile painting that has survived for over four centuries in the Kutch district of Gujarat. The word 'Rogan' comes from Persian, meaning 'oil-based,' referring to the unique paint medium used in this art form.\n\nThe technique involves creating a thick, colorful paste by heating castor oil and mixing it with natural pigments. This paint is then applied to fabric using a metal stylus (kalam) — but here's what makes Rogan art truly remarkable: the artist never touches the brush to the fabric. Instead, the paint is twisted and stretched between the fingers and the stylus, creating fine threads of color that are laid onto the fabric with extraordinary precision.\n\nThe designs are predominantly symmetrical. The artist paints one half of the design, then folds the fabric to transfer the mirror image to the other side, creating perfectly balanced patterns. Common motifs include the tree of life, floral patterns, geometric designs, and peacocks.\n\nToday, the Khatri family of Nirona village in Kutch is the sole practitioner of this art. Abdul Gafur Khatri, who received the National Award for his work, has been instrumental in keeping this tradition alive. His family members continue to practice and teach the art, but the extreme difficulty of the technique and the small number of practitioners make Rogan art one of India's most endangered crafts.\n\nWhen Prime Minister Narendra Modi gifted a Rogan art piece to US President Barack Obama in 2014, it brought international attention to this dying art form.",
                'status' => 'approved',
            ],
            [
                'name' => 'Qawwali',
                'category' => 'music',
                'state' => 'Delhi',
                'short_desc' => 'A powerful form of Sufi devotional music originating from the Indian subcontinent, meant to induce spiritual ecstasy.',
                'long_desc' => "Qawwali is a vibrant and powerful form of Sufi devotional music that has been an integral part of India's musical heritage for over 700 years. Rooted in the Sufi tradition of Islam, Qawwali aims to lead listeners to a state of spiritual ecstasy and divine connection.\n\nThe art form was formalized by Amir Khusrau, the legendary 13th-century poet, musician, and scholar who served in the court of the Delhi Sultanate. Khusrau fused Persian and Turkish musical elements with Indian ragas and talas, creating a distinctive form that would become the vehicle for Sufi spiritual expression.\n\nA Qawwali performance is led by a lead singer (the Qawwal), accompanied by a group of supporting vocalists and musicians. Traditional instruments include the harmonium, tabla, dholak, and the rhythmic clapping of the accompanying singers. The performance typically builds gradually in intensity, with repetitive phrases and increasing tempo designed to create a hypnotic, trance-like atmosphere.\n\nThe lyrics draw from Persian, Urdu, Hindi, and Punjabi, with themes centered on divine love, praise of the Prophet, and devotion to Sufi saints. The most famous venue for Qawwali in India is the Nizamuddin Dargah in Delhi, where weekly performances have taken place for centuries at the shrine of the Sufi saint Hazrat Nizamuddin Auliya.\n\nThe legendary Nusrat Fateh Ali Khan brought Qawwali to the global stage in the late 20th century, while artists like the Sabri Brothers, Abida Parveen, and the Nizami Bandhu continue to keep this tradition alive.",
                'status' => 'approved',
            ],
            [
                'name' => 'Konark Sun Temple',
                'category' => 'monument',
                'state' => 'Odisha',
                'short_desc' => 'A 13th-century UNESCO World Heritage Site in Odisha, designed as a colossal chariot of the Sun God with intricate stone carvings.',
                'long_desc' => "The Konark Sun Temple, located on the eastern coast of Odisha near the town of Puri, is one of India's most magnificent architectural achievements. Built in the 13th century by King Narasimhadeva I of the Eastern Ganga dynasty, this temple is dedicated to Surya, the Hindu Sun God.\n\nThe temple is designed in the form of a gigantic chariot with 24 elaborately carved stone wheels (each about 3 meters in diameter), pulled by seven spirited horses. The wheels are not merely decorative — they function as sundials, and the shadows cast by their spokes can accurately tell the time of day to the minute.\n\nThe temple complex originally consisted of the main sanctum (deul), which rose to approximately 70 meters (now in ruins), the audience hall (jagamohana) which still stands at about 40 meters, the dance hall (nata mandira), and the dining hall (bhoga mandapa). The entire structure is built from Khondalite stone, which takes on different hues throughout the day.\n\nThe walls of the temple are covered with intricate carvings depicting every aspect of life — from celestial beings, mythological narratives, and royal processions to everyday scenes, animals, and erotic sculptures. These carvings are considered masterpieces of medieval Indian art and provide valuable insights into the social, cultural, and religious life of 13th-century Odisha.\n\nDesignated as a UNESCO World Heritage Site in 1984, the Konark Sun Temple is often referred to as the 'Black Pagoda' by European sailors who used it as a navigational landmark. It remains one of India's most visited heritage sites and a testament to the extraordinary engineering and artistic capabilities of ancient Indian civilization.",
                'status' => 'approved',
            ],
            // --- Additional Items to reach 5 per category ---
            // Festivals
            [
                'name' => 'Durga Puja',
                'category' => 'festival',
                'state' => 'West Bengal',
                'short_desc' => 'An annual Hindu festival originating in the Indian subcontinent which reveres and pays homage to the Hindu goddess Durga.',
                'long_desc' => 'Durga Puja is a major Hindu festival celebrated predominantly in West Bengal, Assam, Tripura, and Odisha. It marks the victory of Goddess Durga over the demon king Mahishasura, symbolizing the triumph of good over evil. The festival is characterized by elaborate pandals (temporary structures), stunning idols of the Goddess, traditional drumming (dhak), and vibrant cultural performances. In 2021, Durga Puja in Kolkata was inscribed on the UNESCO Representative List of the Intangible Cultural Heritage of Humanity.',
                'status' => 'approved',
            ],
            [
                'name' => 'Onam',
                'category' => 'festival',
                'state' => 'Kerala',
                'short_desc' => 'An annual Indian harvest festival celebrated predominantly by the people of Kerala.',
                'long_desc' => 'Onam is the most popular festival in the state of Kerala, India. It is a harvest festival celebrated by Malayalees across the world, regardless of their religious backgrounds. According to legend, the festival is celebrated to welcome King Mahabali, whose spirit is said to visit Kerala at the time of Onam. The festival includes intricate floral carpets (Pookkalam), grand feasts (Onasadya), snake boat races (Vallam Kali), and traditional tiger dances (Pulikali).',
                'status' => 'approved',
            ],
            [
                'name' => 'Ganesh Chaturthi',
                'category' => 'festival',
                'state' => 'Maharashtra',
                'short_desc' => 'A Hindu festival celebrating the arrival of Lord Ganesh to earth from Kailash Parvat.',
                'long_desc' => 'Ganesh Chaturthi is a spectacularly vibrant 10-day Hindu festival celebrated primarily in Maharashtra, Gujarat, and Karnataka. The festival marks the birth of the elephant-headed deity Ganesha, the god of prosperity and wisdom. It begins with the installation of beautifully crafted Ganesh idols in homes or elaborate public pandals. The festival culminates on the tenth day (Anant Chaturdashi) when the idols are carried in grand public processions with music and group chanting, to be immersed in a nearby body of water (visarjan).',
                'status' => 'approved',
            ],
            // Dance
            [
                'name' => 'Odissi',
                'category' => 'dance',
                'state' => 'Odisha',
                'short_desc' => 'A major ancient Indian classical dance that originated in the Hindu temples of Odisha.',
                'long_desc' => 'Odissi is renowned for its graceful and fluid movements, often compared to the sculptural poses found in ancient Indian temples. Originating in the temples of Odisha, it traditionally depicts stories from the Vaishnava tradition, particularly the love between Radha and Krishna. The dance is characterized by the Tribhangi posture, a three-part break of the body (head, bust, and torso), which gives Odissi its distinctive lyrical quality. The dancers wear elaborate silver jewelry and a beautiful headpiece called the Tahia.',
                'status' => 'approved',
            ],
            [
                'name' => 'Kuchipudi',
                'category' => 'dance',
                'state' => 'Andhra Pradesh',
                'short_desc' => 'A classical dance form from Andhra Pradesh, known for its quick footwork, dramatic characterization, and expressive eye movements.',
                'long_desc' => 'Kuchipudi originated in a village named Kuchipudi in the Indian state of Andhra Pradesh. What distinguishes Kuchipudi from other classical dance forms is its unique combination of pure dance (nritta), expressive dance (nritya), and drama (natya). It often includes spoken dialogue and singing by the dancers themselves. A signature element of Kuchipudi is the Tarangam, where the dancer balances on the brass edges of a plate while expertly executing complicated rhythmic patterns and balancing a pot of water on their head.',
                'status' => 'approved',
            ],
            [
                'name' => 'Manipuri',
                'category' => 'dance',
                'state' => 'Manipur',
                'short_desc' => 'A lyrical and graceful classical dance form from North-East India, deeply rooted in Vaishnavism.',
                'long_desc' => 'Manipuri dance is deeply intertwined with the rituals and religion of the Manipuri people. The most prominent theme in this dance form is the Ras Leela, which depicts the cosmic love between Krishna and the gopis (milkmaids). Manipuri dance is distinguished by its subtle, undulating, and lyrical movements; dancers do not wear ankle bells to keep the delicate, soft stepping intact. The female dancers wear a unique, barrel-shaped, beautifully decorated skirt called the Potloi, which adds to the ethereal quality of the performance.',
                'status' => 'approved',
            ],
            // Art
            [
                'name' => 'Warli Painting',
                'category' => 'art',
                'state' => 'Maharashtra',
                'short_desc' => 'A tribal art form from Maharashtra that uses basic geometric shapes to depict everyday life and nature.',
                'long_desc' => 'Warli painting is a traditional art form created by the Warli tribe residing in the mountainous and coastal areas of Maharashtra and Gujarat. The art is characterized by its simplicity, using basic geometric shapes like circles, triangles, and squares to create intricate scenes of daily life, hunting, fishing, farming, and festivals. Traditionally, these paintings were done on walls made of a mixture of branches, earth, and cow dung, providing a red ochre background. The white pigment is made from rice paste and water, applied with a bamboo stick chewed at the end to act as a paintbrush.',
                'status' => 'approved',
            ],
            [
                'name' => 'Tanjore Painting',
                'category' => 'art',
                'state' => 'Tamil Nadu',
                'short_desc' => 'A classical South Indian painting style known for its rich colors, surface richness, and use of gold foil.',
                'long_desc' => 'Tanjore painting (Thanjavur painting) is a classical art form that originated in the town of Thanjavur in Tamil Nadu during the 16th century under the Chola dynasty. These paintings are celebrated for their vibrant colors, dense composition, and rich surface embellishments. The subjects are usually Hindu gods, goddesses, and saints, depicted with round faces and almond-shaped eyes. The hallmark of Tanjore paintings is the lavish use of pure 22-carat gold foil, along with semi-precious stones and glass beads, giving the artworks a three-dimensional effect and a luminous glow.',
                'status' => 'approved',
            ],
            // Cuisine
            [
                'name' => 'Rogan Josh',
                'category' => 'cuisine',
                'state' => 'Jammu and Kashmir',
                'short_desc' => 'A hearty, flavorful lamb or goat curry originating from Kashmir, characterized by its deep red color and aromatic spices.',
                'long_desc' => 'Rogan Josh is a signature dish of Kashmiri cuisine, introduced to the region by the Mughals. The name roughly translates to "red meat" or "passionate meat" in Persian. The dish consists of tender pieces of lamb or mutton slow-cooked in a rich, deeply flavored gravy made from browned onions, yogurt, garlic, ginger, and a blend of aromatic spices. Its brilliant red hue comes from the generous use of Kashmiri dry red chilies or Ratan Jot (alkanet root), which provide vibrant color without excessive heat. It is a staple of the Kashmiri Wazwan, a multi-course traditional feast.',
                'status' => 'approved',
            ],
            [
                'name' => 'Masala Dosa',
                'category' => 'cuisine',
                'state' => 'Karnataka',
                'short_desc' => 'A popular South Indian dish made from a fermented crepe of rice and lentils, filled with a spiced potato curry.',
                'long_desc' => 'Masala Dosa is an internationally beloved South Indian breakfast staple that originated in the city of Udupi in Karnataka. The crepe (dosa) is made from a fermented batter of rice and urad dal, spread thinly on a hot griddle to achieve a perfectly crisp exterior. It is then generously smeared with ghee or butter and filled with a savory, lightly spiced potato and onion curry. Masala Dosa is traditionally served with fresh coconut chutney and a hot, tangy lentil-based stew called sambar. Its combination of textures—crispy on the outside, soft on the inside—makes it irresistibly delicious.',
                'status' => 'approved',
            ],
            [
                'name' => 'Dhokla',
                'category' => 'cuisine',
                'state' => 'Gujarat',
                'short_desc' => 'A savory, spongy vegetarian snack made from a fermented batter of chickpea flour.',
                'long_desc' => 'Dhokla is a quintessential Gujarati snack known for its light, spongy texture and harmonious balance of sweet, tangy, and spicy flavors. It is made from a fermented batter of besan (chickpea flour) or a mixture of rice and split chickpeas. The batter is steamed, cut into squares, and then tempered with a sizzle of hot oil containing mustard seeds, cumin, green chilies, curry leaves, and sometimes sesame seeds. Often garnished with fresh coriander and grated coconut, Dhokla is a healthy, low-calorie dish usually enjoyed with green mint-coriander chutney and sweet tamarind chutney.',
                'status' => 'approved',
            ],
            [
                'name' => 'Makki di Roti & Sarson da Saag',
                'category' => 'cuisine',
                'state' => 'Punjab',
                'short_desc' => 'A classic Punjabi winter delicacy consisting of mustard greens curry and maize flour flatbread.',
                'long_desc' => 'This iconic duo is the culinary heartbeat of Punjab, particularly during the winter months. Sarson da Saag is a robust, slow-cooked curry made primarily from fresh mustard greens, often blended with spinach and bathua for balance, and tempered with ghee, garlic, ginger, and green chilies. It is traditionally paired with Makki di Roti, a rustic, unleavened flatbread made from coarse maize (corn) flour. The meal is incomplete without a generous dollop of homemade white butter (makhan) and a side of jaggery (gud), offering a perfect representation of Punjab\'s rich agricultural heritage.',
                'status' => 'approved',
            ],
            // Monument
            [
                'name' => 'Qutub Minar',
                'category' => 'monument',
                'state' => 'Delhi',
                'short_desc' => 'A towering 73-meter high minaret in Delhi, representing the earliest Islamic architecture in India.',
                'long_desc' => 'The Qutub Minar is a magnificent, soaring tower of victory built in 1193 by Qutab-ud-din Aibak immediately after the defeat of Delhi\'s last Hindu kingdom. Standing at 73 meters tall, it is the highest brick minaret in the world and a UNESCO World Heritage Site. The tower features five distinct storeys, each marked by a projecting balcony. The first three storeys are constructed of red sandstone, while the top two are made of marble and sandstone. The intricate carvings and verses from the Quran etched into its facade make it a stunning masterpiece of Indo-Islamic architecture.',
                'status' => 'approved',
            ],
            [
                'name' => 'Hawa Mahal',
                'category' => 'monument',
                'state' => 'Rajasthan',
                'short_desc' => 'The "Palace of Winds" in Jaipur, famous for its unique honeycomb-like facade with 953 windows.',
                'long_desc' => 'Constructed in 1799 by Maharaja Sawai Pratap Singh, the Hawa Mahal is one of the most recognizable monuments in Jaipur, the Pink City. The five-story structure is built from red and pink sandstone and is famously designed in the shape of the crown of Lord Krishna. Its most striking feature is its exterior—akin to the honeycomb of a beehive—which holds 953 small windows called "jharokhas" decorated with intricate latticework. The primary intent of this design was to allow royal ladies to observe everyday life and festivals in the street below without being seen, while the lattice also acted as an air conditioner, cooling the palace during hot summers.',
                'status' => 'approved',
            ],
            [
                'name' => 'Ajanta Caves',
                'category' => 'monument',
                'state' => 'Maharashtra',
                'short_desc' => 'A series of ancient rock-cut Buddhist cave monuments featuring extraordinary paintings and sculptures.',
                'long_desc' => 'The Ajanta Caves, a UNESCO World Heritage Site, consist of 30 rock-cut Buddhist cave monuments dating from the 2nd century BCE to about 480 CE. Located in the Aurangabad district of Maharashtra, these caves are universally regarded as masterpieces of Buddhist religious art. The caves served as monasteries and worship halls for monks. What sets Ajanta apart are its incredibly preserved mural paintings, executed using the dry fresco technique. The paintings depict scenes from the life of Buddha and the Jataka tales, illustrating the previous lives of the Buddha, with astonishing detail, expressiveness, and a profound sense of serenity.',
                'status' => 'approved',
            ],
            // Music
            [
                'name' => 'Carnatic Music',
                'category' => 'music',
                'state' => 'South India',
                'short_desc' => 'The classical music system of South India, known for its intricate rhythmic patterns and devotional themes.',
                'long_desc' => 'Carnatic music is one of the two main subgenres of Indian classical music, deeply rooted in South Indian culture (primarily in Tamil Nadu, Karnataka, Andhra Pradesh, and Kerala). Unlike Hindustani music, Carnatic music places a greater emphasis on vocal music; most compositions are written to be sung, even when played on instruments. The music is built on a complex system of ragas (melodic frameworks) and talas (rhythmic cycles). Key composers known as the "Trinity of Carnatic Music"—Tyagaraja, Muthuswami Dikshitar, and Syama Sastri—created thousands of profound, devotion-laden compositions in the 18th and 19th centuries that are still performed today.',
                'status' => 'approved',
            ],
            [
                'name' => 'Hindustani Classical',
                'category' => 'music',
                'state' => 'North India',
                'short_desc' => 'The classical music tradition of northern regions of the Indian subcontinent, deeply influenced by Persian and Islamic elements.',
                'long_desc' => 'Hindustani classical music originated in Vedic ritual chants but evolved significantly after the 12th century, absorbing profound Persian and Islamic influences during the Mughal era. It places a strong emphasis on improvisation and the emotional exploration of a raga (melody). A typical performance slowly builds from an unmetered, slow introduction (alap) to rhythmic, fast-paced compositions (gat) accompanied by the tabla. Major vocal forms include Dhrupad, Khayal, and Thumri. Instruments like the Sitar, Sarod, Santoor, and Bansuri (flute) are central to this highly expressive and spiritual musical tradition.',
                'status' => 'approved',
            ],
            [
                'name' => 'Bihu Music',
                'category' => 'music',
                'state' => 'Assam',
                'short_desc' => 'Vibrant, energetic folk music that forms the heart of the Bihu festivals in Assam.',
                'long_desc' => 'Bihu music is the energetic and rhythmic folk music that accompanies the Bihu festivals, the most important cultural celebrations in Assam. It is deeply connected to nature, agriculture, and the changing seasons, particularly the spring festival of Rongali Bihu. The music is characterized by the robust beats of the dhol (a two-sided drum), the haunting melodies of the pepa (a horn made from buffalo horn), the rhythmic clatter of the toka (a bamboo clapper), and the sweet notes of the gogona (a jaw harp). The lyrics often celebrate youth, love, and the joy of the harvest season, inspiring vigorous and joyful community dancing.',
                'status' => 'approved',
            ],
        ];

        foreach ($items as $item) {
            HeritageItem::firstOrCreate(['name' => $item['name']], $item);
        }
    }
}
