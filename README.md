Language Tools
================
This is a set of language and text processing tools in PHP by shehabic

I-BijoyToUnicodeConverter
=========================

Bijoy (Bengali) Bangladishian to Unicode (UTF-8) Converter

This is a tiny bit cleaner and object oriented version of a procedural code to convert Bijoy (Bengali) text written with Bengali/Bijoy character mapping to utf-8

How to use BijoyToUnicodeConverter
==================================

    $bijoyToUnicodeConverter = new BijoyToUnicodeConverter();
    $utf8String = $bijoyToUnicodeConverter->convert("Bijoy String");
