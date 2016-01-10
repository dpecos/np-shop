# Introduction #
NP-Shop uses `gettext` for i18n.

# Details #

**Sites:**
```
cd npshop/sites/davidbenavente/npshop/i18n

xgettext ../../*.php --output=index.pot --from-code=ISO-8859-1
xgettext -j ../../admin/*.php --output=index.pot --from-code=ISO-8859-1
xgettext -j ../../npshop/*.php --output=index.pot --from-code=ISO-8859-1

msgmerge --update en_US/LC_MESSAGES/messages.po index.pot
(gtranslator)

rm index.pot
msgconv -t iso-8859-1 en_US/LC_MESSAGES/messages.po > en_US/LC_MESSAGES/messages.po_iso
mv en_US/LC_MESSAGES/messages.po_iso en_US/LC_MESSAGES/messages.po

msgfmt en_US/LC_MESSAGES/messages.po -o en_US/LC_MESSAGES/messages.mo
```

**Core:**
```
xgettext ../src/admin/*.php --output=index.pot --from-code=ISO-8859-1
xgettext -j ../src/common/*.php --output=index.pot --from-code=ISO-8859-1
xgettext -j ../src/config/*.php --output=index.pot --from-code=ISO-8859-1
xgettext -j ../src/flows/*.php --output=index.pot --from-code=ISO-8859-1
msgconv -t iso-8859-1 index.pot > indexISO.pot
msgmerge --update messages.po indexISO.pot 
msgfmt messages.po -o messages.mo
```