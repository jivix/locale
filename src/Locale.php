<?php declare(strict_types=1);

namespace Jivix\Locale;

use Serializable;
use InvalidArgumentException;

class Locale implements Serializable
{
    /**
     * ISO 639-1 alpha-2 Language code constants
     */
    const ENGLISH = 'en';
    const FRENCH = 'fr';
    const GERMAN = 'de';
    const ITALIAN = 'it';
    const JAPANESE = 'ja';
    const KOREAN = 'ko';
    const DUTCH = 'nl';
    const SPANISH = 'es';
    const TAGALOG = 'tl';
    const CHINESE = 'zh';
    const CHINESE_SIMPLIFIED = 'zh_Hans';
    const CHINESE_TRADITIONAL = 'zh_Hant';

    /**
     * ISO 3166-1 alpha-2 Country code constants
     */
    const CANADA = 'CA';
    const CHINA = 'CN';
    const FRANCE = 'FR';
    const GERMANY = 'DE';
    const ITALY = 'IT';
    const JAPAN = 'JP';
    const KOREA = 'KR';
    const PRC = 'CN';
    const TAIWAN = 'TW';
    const UK = 'UK';
    const US = 'US';
    const NETHERLANDS = 'NL';
    const BELGIUM = 'BE';
    const SPAIN = 'ES';
    const PHILIPPINES = 'PH';

    /**
     * A list of ISO 639-1 alpha-2 Language codes.
     *
     * @var array
     */
    static protected array $languages = [
        'aa', 'ab', 'ae', 'af', 'ak', 'am', 'an', 'ar', 'as', 'av', 'ay', 'az', 'ba', 'be', 'bg', 'bh', 'bi', 'bm',
        'bn', 'bo', 'br', 'bs', 'ca', 'ce', 'ch', 'co', 'cr', 'cs', 'cu', 'cv', 'cy', 'da', 'de', 'dv', 'dz', 'ee',
        'el', 'en', 'eo', 'es', 'et', 'eu', 'fa', 'ff', 'fi', 'fj', 'fo', 'fr', 'fy', 'ga', 'gd', 'gl', 'gn', 'gu',
        'gv', 'ha', 'he', 'hi', 'ho', 'hr', 'ht', 'hu', 'hy', 'hz', 'ia', 'id', 'ie', 'ig', 'ii', 'ik', 'io', 'is',
        'it', 'iu', 'ja', 'jv', 'ka', 'kg', 'ki', 'kj', 'kk', 'kl', 'km', 'kn', 'ko', 'kr', 'ks', 'ku', 'kv', 'kw',
        'ky', 'la', 'lb', 'lg', 'li', 'ln', 'lo', 'lt', 'lu', 'lv', 'mg', 'mh', 'mi', 'mk', 'ml', 'mn', 'mr', 'ms',
        'mt', 'my', 'na', 'nb', 'nd', 'ne', 'ng', 'nl', 'nn', 'no', 'nr', 'nv', 'ny', 'oc', 'oj', 'om', 'or', 'os',
        'pa', 'pi', 'pl', 'ps', 'pt', 'qu', 'rm', 'rn', 'ro', 'ru', 'rw', 'sa', 'sc', 'sd', 'se', 'sg', 'si', 'sk',
        'sl', 'sm', 'sn', 'so', 'sq', 'sr', 'ss', 'st', 'su', 'sv', 'sw', 'ta', 'te', 'tg', 'th', 'ti', 'tk', 'tl',
        'tn', 'to', 'tr', 'ts', 'tt', 'tw', 'ty', 'ug', 'uk', 'ur', 'uz', 've', 'vi', 'vo', 'wa', 'wo', 'xh', 'yi',
        'yo', 'za', 'zh', 'zu', 'xx'
    ];

    /**
     * A list of ISO 639-2 alpha-3 Language codes.
     *
     * @var array
     */
    static protected array $iso3languages = [
        'aar', 'abk', 'ave', 'afr', 'aka', 'amh', 'arg', 'ara', 'asm', 'ava', 'aym', 'aze', 'bak', 'bel', 'bul', 'bih',
        'bis', 'bam', 'ben', 'bod', 'bre', 'bos', 'cat', 'che', 'cha', 'cos', 'cre', 'ces', 'chu', 'chv', 'cym', 'dan',
        'deu', 'div', 'dzo', 'ewe', 'ell', 'eng', 'epo', 'spa', 'est', 'eus', 'fas', 'ful', 'fin', 'fij', 'fao', 'fra',
        'fry', 'gle', 'gla', 'glg', 'grn', 'guj', 'glv', 'hau', 'heb', 'hin', 'hmo', 'hrv', 'hat', 'hun', 'hye', 'her',
        'ina', 'ind', 'ile', 'ibo', 'iii', 'ipk', 'ido', 'isl', 'ita', 'iku', 'jpn', 'jav', 'kat', 'kon', 'kik', 'kua',
        'kaz', 'kal', 'khm', 'kan', 'kor', 'kau', 'kas', 'kur', 'kom', 'cor', 'kir', 'lat', 'ltz', 'lug', 'lim', 'lin',
        'lao', 'lit', 'lub', 'lav', 'mlg', 'mah', 'mri', 'mkd', 'mal', 'mon', 'mar', 'msa', 'mlt', 'mya', 'nau', 'nob',
        'nde', 'nep', 'ndo', 'nld', 'nno', 'nor', 'nbl', 'nav', 'nya', 'oci', 'oji', 'orm', 'ori', 'oss', 'pan', 'pli',
        'pol', 'pus', 'por', 'que', 'roh', 'run', 'ron', 'rus', 'kin', 'san', 'srd', 'snd', 'sme', 'sag', 'sin', 'slk',
        'slv', 'smo', 'sna', 'som', 'sqi', 'srp', 'ssw', 'sot', 'sun', 'swe', 'swa', 'tam', 'tel', 'tgk', 'tha', 'tir',
        'tuk', 'tgl', 'tsn', 'ton', 'tur', 'tso', 'tat', 'twi', 'tah', 'uig', 'ukr', 'urd', 'uzb', 'ven', 'vie', 'vol',
        'wln', 'wol', 'xho', 'yid', 'yor', 'zha', 'zho', 'zul', 'xxx'
    ];

    /**
     * A list of ISO 3166-1 alpha-2 Country codes.
     *
     * @var array
     */
    static protected array $countries = [
        'AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB',
        'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BY',
        'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX',
        'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK',
        'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS',
        'GT', 'GU', 'GW', 'GY', 'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR',
        'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ', 'LA',
        'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK',
        'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC', 'NE',
        'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM',
        'PN', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD', 'SE', 'SG',
        'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SX', 'SY', 'SZ', 'TC', 'TD', 'TF',
        'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY',
        'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'YE', 'YT', 'ZA', 'ZM', 'ZW', 'XX'
    ];

    /**
     * A list of ISO 3166-1 alpha-3 Country codes.
     *
     * @var array
     */
    static protected array $iso3countries = [
        'AND', 'ARE', 'AFG', 'ATG', 'AIA', 'ALB', 'ARM', 'AGO', 'ATA', 'ARG', 'ASM', 'AUT', 'AUS', 'ABW', 'ALA', 'AZE',
        'BIH', 'BRB', 'BGD', 'BEL', 'BFA', 'BGR', 'BHR', 'BDI', 'BEN', 'BLM', 'BMU', 'BRN', 'BOL', 'BES', 'BRA', 'BHS',
        'BTN', 'BVT', 'BWA', 'BLR', 'BLZ', 'CAN', 'CCK', 'COD', 'CAF', 'COG', 'CHE', 'CIV', 'COK', 'CHL', 'CMR', 'CHN',
        'COL', 'CRI', 'CUB', 'CPV', 'CUW', 'CXR', 'CYP', 'CZE', 'DEU', 'DJI', 'DNK', 'DMA', 'DOM', 'DZA', 'ECU', 'EST',
        'EGY', 'ESH', 'ERI', 'ESP', 'ETH', 'FIN', 'FJI', 'FLK', 'FSM', 'FRO', 'FRA', 'GAB', 'GBR', 'GRD', 'GEO', 'GUF',
        'GGY', 'GHA', 'GIB', 'GRL', 'GMB', 'GIN', 'GLP', 'GNQ', 'GRC', 'SGS', 'GTM', 'GUM', 'GNB', 'GUY', 'HKG', 'HMD',
        'HND', 'HRV', 'HTI', 'HUN', 'IDN', 'IRL', 'ISR', 'IMN', 'IND', 'IOT', 'IRQ', 'IRN', 'ISL', 'ITA', 'JEY', 'JAM',
        'JOR', 'JPN', 'KEN', 'KGZ', 'KHM', 'KIR', 'COM', 'KNA', 'PRK', 'KOR', 'KWT', 'CYM', 'KAZ', 'LAO', 'LBN', 'LCA',
        'LIE', 'LKA', 'LBR', 'LSO', 'LTU', 'LUX', 'LVA', 'LBY', 'MAR', 'MCO', 'MDA', 'MNE', 'MAF', 'MDG', 'MHL', 'MKD',
        'MLI', 'MMR', 'MNG', 'MAC', 'MNP', 'MTQ', 'MRT', 'MSR', 'MLT', 'MUS', 'MDV', 'MWI', 'MEX', 'MYS', 'MOZ', 'NAM',
        'NCL', 'NER', 'NFK', 'NGA', 'NIC', 'NLD', 'NOR', 'NPL', 'NRU', 'NIU', 'NZL', 'OMN', 'PAN', 'PER', 'PYF', 'PNG',
        'PHL', 'PAK', 'POL', 'SPM', 'PCN', 'PRI', 'PSE', 'PRT', 'PLW', 'PRY', 'QAT', 'REU', 'ROU', 'SRB', 'RUS', 'RWA',
        'SAU', 'SLB', 'SYC', 'SDN', 'SWE', 'SGP', 'SHN', 'SVN', 'SJM', 'SVK', 'SLE', 'SMR', 'SEN', 'SOM', 'SUR', 'SSD',
        'STP', 'SLV', 'SXM', 'SYR', 'SWZ', 'TCA', 'TCD', 'ATF', 'TGO', 'THA', 'TJK', 'TKL', 'TLS', 'TKM', 'TUN', 'TON',
        'TUR', 'TTO', 'TUV', 'TWN', 'TZA', 'UKR', 'UGA', 'UMI', 'USA', 'URY', 'UZB', 'VAT', 'VCT', 'VEN', 'VGB', 'VIR',
        'VNM', 'VUT', 'WLF', 'WSM', 'YEM', 'MYT', 'ZAF', 'ZMB', 'ZWE', 'XXX'
    ];

    /**
     * A list of ISO 15924 alpha-4 script codes.
     *
     * @see http://www.unicode.org/iso15924/
     * @var array
     */
    static protected array $scripts = [
        'Adlm', 'Afak', 'Aghb', 'Ahom', 'Arab', 'Aran', 'Armi', 'Armn', 'Avst', 'Bali', 'Bamu', 'Bass', 'Batk', 'Beng',
        'Blis', 'Bopo', 'Brah', 'Brai', 'Bugi', 'Buhd', 'Cakm', 'Cans', 'Cari', 'Cham', 'Cher', 'Cirt', 'Copt', 'Cprt',
        'Cyrl', 'Cyrs', 'Deva', 'Dsrt', 'Dupl', 'Egyd', 'Egyh', 'Egyp', 'Elba', 'Ethi', 'Geok', 'Geor', 'Glag', 'Goth',
        'Gran', 'Grek', 'Gujr', 'Guru', 'Hang', 'Hani', 'Hano', 'Hans', 'Hant', 'Hatr', 'Hebr', 'Hira', 'Hluw', 'Hmng',
        'Hrkt', 'Hung', 'Inds', 'Ital', 'Java', 'Jpan', 'Jurc', 'Kali', 'Kana', 'Khar', 'Khmr', 'Khoj', 'Kitl', 'Kits',
        'Knda', 'Kore', 'Kpel', 'Kthi', 'Lana', 'Laoo', 'Latf', 'Latg', 'Latn', 'Lepc', 'Limb', 'Lina', 'Linb', 'Lisu',
        'Loma', 'Lyci', 'Lydi', 'Mahj', 'Mand', 'Mani', 'Marc', 'Maya', 'Mend', 'Merc', 'Mero', 'Mlym', 'Modi', 'Mong',
        'Moon', 'Mroo', 'Mtei', 'Mult', 'Mymr', 'Narb', 'Nbat', 'Nkgb', 'Nkoo', 'Nshu', 'Ogam', 'Olck', 'Orkh', 'Orya',
        'Osge', 'Osma', 'Palm', 'Pauc', 'Perm', 'Phag', 'Phli', 'Phlp', 'Phlv', 'Phnx', 'Plrd', 'Prti', 'Qaaa', 'Qabx',
        'Rjng', 'Roro', 'Runr', 'Samr', 'Sara', 'Sarb', 'Saur', 'Sgnw', 'Shaw', 'Shrd', 'Sidd', 'Sind', 'Sinh', 'Sora',
        'Sund', 'Sylo', 'Syrc', 'Syre', 'Syrj', 'Syrn', 'Tagb', 'Takr', 'Tale', 'Talu', 'Taml', 'Tang', 'Tavt', 'Telu',
        'Teng', 'Tfng', 'Tglg', 'Thaa', 'Thai', 'Tibt', 'Tirh', 'Ugar', 'Vaii', 'Visp', 'Wara', 'Wole', 'Xpeo', 'Xsux',
        'Yiii', 'Zinh', 'Zmth', 'Zsym', 'Zxxx', 'Zyyy', 'Zzzz'
    ];

    /**
     * @var string
     */
    private string $language;

    /**
     * @var string|null
     */
    private ?string $country;

    /**
     * @var string|null
     */
    private ?string $variant;

    /**
     * @var string|null
     */
    private ?string $script;

    /**
     * Construct a locale from language, country, variant and script.
     * This constructor normalizes the language value to lowercase and the country value to uppercase.
     *
     * @param string $language ISO 639 alpha-2 language code
     * @param string $country ISO 3166 alpha-2 country code
     * @param string $script ISO 15924 alpha-4 script code
     * @param string $variant Any arbitrary value used to indicate a variation of a Locale
     * @return void
     */
    public function __construct(string $language, ?string $country = null, ?string $script = null, ?string $variant = null)
    {
        // Language
        if (null === $language) {
            throw new InvalidArgumentException('Argument `language` cannot be null.');
        }
        if (preg_match('/^[a-z]{2,3}/', $language) && in_array($language, self::getISOLanguages())) {
            $this->language = $language;
        } else {
            throw new InvalidArgumentException('Argument `language` is not a valid ISO 639 alpha-2 language code.');
        }

        // Script
        if (null !== $script) {
            $script = ucfirst($script);
            if (preg_match('/^[a-zA-Z]{4}/', $script) && in_array($script, self::getISOScripts())) {
                $this->script = $script;
            } else {
                throw new InvalidArgumentException('Argument `script` is not a valid ISO 15924 alpha-4 script code.');
            }
        } else {
            $this->script = null;
        }

        // Country
        if (null !== $country) {
            if (preg_match('/^[A-Z]{2}/', $country) && in_array($country, self::getISOCountries())) {
                $this->country = $country;
            } else {
                throw new InvalidArgumentException('Argument `country` is not a valid ISO 3166 alpha-2 country code.');
            }
        } else {
            $this->country = null;
        }

        // Variant
        if (null !== $variant && preg_match('/^[0-9a-zA-Z-_]*/', $variant)) {
            $this->variant = $variant;
        } else {
            $this->variant = null;
        }
    }

    /**
     * @param Locale $locale
     * @return string
     */
    public function getDisplayName(Locale $locale = null): string
    {
        if (null === $locale) {
            $locale = $this;
        }
        return \Locale::getDisplayName($this->toLanguageTag(), $locale->toLanguageTag());
    }

    /**
     * @param Locale|null $locale
     * @return string
     */
    public function getDisplayLanguage(Locale $locale = null): string
    {
        if (null === $locale) {
            $locale = $this;
        }
        return \Locale::getDisplayLanguage($this->toLanguageTag(), $locale->toLanguageTag());
    }

    /**
     * @param Locale|null $locale
     * @return string|null
     */
    public function getDisplayScript(Locale $locale = null): ?string
    {
        if (null === $locale) {
            $locale = $this;
        }
        return null !== $this->script
            ? \Locale::getDisplayScript($this->toLanguageTag(), $locale->toLanguageTag())
            : null;
    }

    /**
     * @param Locale|null $locale
     * @return string|null
     */
    public function getDisplayCountry(Locale $locale = null): ?string
    {
        if (null === $locale) {
            $locale = $this;
        }
        return null !== $this->country
            ? \Locale::getDisplayRegion($this->toLanguageTag(), $locale->toLanguageTag())
            : null;
    }

    /**
     * @param Locale|null $locale
     * @return string|null
     */
    public function getDisplayVariant(Locale $locale = null): ?string
    {
        if (null === $locale) {
            $locale = $this;
        }
        return null !== $this->variant
            ? \Locale::getDisplayVariant($this->toLanguageTag(), $locale->toLanguageTag())
            : null;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getVariant(): ?string
    {
        return $this->variant;
    }

    /**
     * @return string|null
     */
    public function getScript(): ?string
    {
        return $this->script;
    }

    /**
     * @return string|null
     */
    public function getISO3Language(): ?string
    {
        $key = array_search($this->language, self::$languages);

        return self::$iso3languages[$key] ?? null;
    }

    /**
     * @return string|null
     */
    public function getISO3Country(): ?string
    {
        $key = array_search($this->country, self::$countries);

        return self::$iso3countries[$key] ?? null;
    }

    /**
     * Returns an array of all locales.
     *
     * @return array
     */
    public function getAvailableLocales(): array
    {
        $locales = [];
        foreach (self::getISOLanguages() as $language) {
            $locales[] = new self($language);
        }
        return $locales;
    }

    /**
     * Returns a list of all 2-letter language codes defined in ISO 639.
     *
     * @return array
     */
    public static function getISOLanguages(): array
    {
        return self::$languages;
    }

    /**
     * Returns a list of all 2-letter country codes defined in ISO 3166.
     *
     * @return array
     */
    public static function getISOCountries(): array
    {
        return self::$countries;
    }

    /**
     * Returns a list of all 4-letter script codes defined in ISO 15924.
     *
     * @return array
     */
    public static function getISOScripts(): array
    {
        return self::$scripts;
    }

    /**
     * Returns a list of all 3-letter language codes defined in ISO 639.
     *
     * @return array
     */
    public static function getISO3Languages(): array
    {
        return self::$iso3languages;
    }

    /**
     * Returns a list of all 3-letter country codes defined in ISO 3166.
     *
     * @return array
     */
    public static function getISO3Countries(): array
    {
        return self::$iso3countries;
    }

//    /**
//     * @param Locale $locale
//     * @return array
//     * @throws NullPointerException
//     */
//    public static function getLocales(): array
//    {
//        $languageTags = self::getLanguageTags();
//
//        $locales = [];
//        foreach ($languageTags as $languageTag => $translation) {
//            $locales[] = Locale::forLanguageTag($languageTag);
//        }
//
//        return $locales;
//    }

    /**
     * Returns a locale for the specified IETF BCP 47 language tag string.
     *
     * @param string $languageTag IETF BCP 47 language tag
     * @return Locale The locale that best represents the language tag
     * @throws InvalidArgumentException
     */
    public static function forLanguageTag(?string $languageTag): Locale
    {
        if (null === $languageTag) {
            throw new InvalidArgumentException('Argument `languageTag` cannot be null.');
        }

        $language = null;
        $country = null;
        $script = null;
        $variant = null;

        $matches = [];
        if (preg_match('/^([a-z]{2,3})[_-]{1}([a-zA-Z]{2,4})[_-]?([0-9a-zA-Z-_#]*)/', $languageTag, $matches)) {
            // Language
            if (in_array($matches[1], self::getISOLanguages())) {
                $language = $matches[1];
            } else {
                throw new InvalidArgumentException('Argument `languageTag` is not a valid IETF BCP 47 language tag.');
            }
            // Country or Script
            if (in_array($matches[2], self::getISOCountries())) {
                $country = $matches[2];
            } else if (in_array($matches[2], self::getISOScripts())) {
                $script = $matches[2];
            } else {
                throw new InvalidArgumentException('Argument `languageTag` is not a valid IETF BCP 47 language tag.');
            }
            // Country, Script or Variant(s)
            if (preg_match('/^([a-zA-Z]{2,8})[_-]?([0-9a-zA-Z-_#]*)/', $matches[3], $matches)) {
                $variants = [];
                if (empty($country) && in_array($matches[1], self::getISOCountries())) {
                    $country = $matches[1];
                } else if (empty($script) && in_array($matches[1], self::getISOScripts())) {
                    $script = $matches[1];
                } else {
                    $variants[] = $matches[1];
                }
                if (!empty($matches[2])) {
                    $parts = explode('_', str_replace('-', '_', $matches[2]));

                    foreach ($parts as $part) {
                        if (preg_match('/^[0-9a-zA-Z]{3,8}/', $part)) {
                            $variants[] = $part;
                        }
                    }
                }
                $variant = implode('_', $variants);
            }
        } else if (preg_match('/^([a-z]{2,3})$/', $languageTag, $matches)) {
            if (in_array($matches[1], self::getISOLanguages())) {
                $language = $matches[1];
            } else {
                throw new InvalidArgumentException('Argument `languageTag` is not a valid IETF BCP 47 language tag.');
            }
        } else {
            throw new InvalidArgumentException('Argument `languageTag` is not a valid IETF BCP 47 language tag.');
        }

        return new self($language, $country, $script, $variant);
    }

    /**
     * Returns a well-formed IETF BCP 47 language tag representing this locale.
     *
     * Note: Although the language tag created by this method is well-formed (satisfies the syntax requirements defined by the IETF BCP 47 specification), it is not necessarily a valid BCP 47 language tag. For example,
     * new Locale('xx', 'YY')->toLanguageTag();
     * will return "xx-YY", but the language subtag "xx" and the region subtag "YY" are invalid because they are not registered in the IANA Language Subtag Registry.
     *
     * @param string $separator
     * @return string a BCP47 language tag representing the locale
     */
    public function toLanguageTag(string $separator = '-'): string
    {
        $languageTag = $this->language;

        if (null !== $this->script) {
            $languageTag .= $separator . $this->script;
        }

        if (null !== $this->country) {
            $languageTag .= $separator . $this->country;
        }

        if (null !== $this->variant) {
            $languageTag .= $separator . $this->variant;
        }

        return $languageTag;
    }

    /**
     * Returns a string representation of this object.
     *
     * @return string
     */
    public final function toString(): string
    {
        return $this->toLanguageTag();
    }

    /**
     * Returns the string representation of this object.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Generates a storable representation of the object.
     *
     * @return string
     */
    public function serialize()
    {
        return serialize([
            'language' => $this->language,
            'script' => $this->script,
            'country' => $this->country,
            'variant' => $this->variant
        ]);
    }

    /**
     * Creates an object from a stored representation.
     *
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $unserialized = unserialize($serialized);

        $this->language = $unserialized['language'];
        $this->script = $unserialized['script'];
        $this->country = $unserialized['country'];
        $this->variant = $unserialized['variant'];
    }
}
