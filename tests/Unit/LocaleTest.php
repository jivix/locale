<?php declare(strict_types=1);

namespace Jivix\Locale\Tests;

use InvalidArgumentException;
use Jivix\Locale\Locale;
use PHPUnit\Framework\TestCase;

class LocaleTest extends TestCase
{
    public function testCanBeCreated()
    {
        $locale = new Locale('en', 'US');

        $this->assertEquals('en-US', $locale->toLanguageTag());
    }

    public function testExceptionThrownOnCreation()
    {
        $this->expectException(InvalidArgumentException::class);

        new Locale('foo', 'bar');
    }

    public function testDisplayNameSameLocale()
    {
        $locale = new Locale('en', 'US');

        $this->assertEquals('English (United States)', $locale->getDisplayName());
    }

    public function testDisplayNameWithDisplayLocale()
    {
        $locale = new Locale('en', 'US');
        $displayLocale = new Locale('zh', 'CN');

        $this->assertEquals('英语（美国）', $locale->getDisplayName($displayLocale));
    }

    public function testValidDisplayNames()
    {
        $input = [
            'en' => 'English',
            'en-US' => 'English (United States)',
            'en-GB' => 'English (United Kingdom)',
            'nl' => 'Nederlands',
            'nl-NL' => 'Nederlands (Nederland)',
            'zh' => '中文',
            'zh-CN' => '中文（中国）',
            'zh-TW' => '中文（台灣）',
            'zh-Hans' => '中文（简体）',
            'zh-Hant' => '中文（繁體）',
            'zh-Hans-CN' => '中文（简体，中国）',
            'zh-Hant-CN' => '中文（繁體，中國）',
            'en_US' => 'English (United States)',
        ];

        foreach ($input as $languageTag => $displayName) {
            $locale = Locale::forLanguageTag($languageTag);

            $this->assertEquals($displayName, $locale->getDisplayName());
        }
    }

    public function testGetters()
    {
        $locale = $locale = new Locale('en', 'US');

        $this->assertEquals('English (United States)', $locale->getDisplayName());
        $this->assertEquals('English', $locale->getDisplayLanguage());
        $this->assertNull($locale->getDisplayScript());
        $this->assertEquals('United States', $locale->getDisplayCountry());
        $this->assertNull($locale->getDisplayVariant());
        $this->assertEquals('en', $locale->getLanguage());
        $this->assertNull($locale->getScript());
        $this->assertEquals('US', $locale->getCountry());
        $this->assertNull($locale->getVariant());
        $this->assertEquals('eng', $locale->getISO3Language());
        $this->assertEquals('USA', $locale->getISO3Country());
        $this->assertEquals('en-US', $locale->toLanguageTag());

        $locale = $locale = new Locale('zh', null, 'Hans');

        $this->assertEquals('中文（简体）', $locale->getDisplayName());
        $this->assertEquals('中文', $locale->getDisplayLanguage());
        $this->assertEquals('简体中文', $locale->getDisplayScript());
        $this->assertNull($locale->getDisplayCountry());
        $this->assertNull($locale->getDisplayVariant());
        $this->assertEquals('zh', $locale->getLanguage());
        $this->assertEquals('Hans', $locale->getScript());
        $this->assertNull($locale->getCountry());
        $this->assertNull($locale->getVariant());
        $this->assertEquals('zho', $locale->getISO3Language());
        $this->assertNull($locale->getISO3Country());
        $this->assertEquals('zh-Hans', $locale->toLanguageTag());
    }

    public function testSerialization()
    {
        $in = $locale = new Locale('en', 'US');

        $out = unserialize(serialize($in));

        $this->assertEquals('en-US', $out->toLanguageTag());
    }
}