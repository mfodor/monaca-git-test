# Php Git packages comparison

This mini repo is to compare the performance of some Php libraries
that handle Git commands such as pull, push, commit, etc.

## Setup

```bash
composer install

# Clone a test repo into `/repos` folder
cd repos
git clone <git@gitprovider.com:user/your-test-repo.git> coyl
git clone <git@gitprovider.com:user/your-test-repo.git> cpliakas
git clone <git@gitprovider.com:user/your-test-repo.git> cypresslab
git clone <git@gitprovider.com:user/your-test-repo.git> czproject

# Run script
cd <project dir>
php index.php
```

## Requirements

- Php 5.6
- Composer

## Php >=7.2

If you have Php 7 or above `\GitElephant\Objects\Object` can cause
errors because `Object` become a reserved name. Modify the source
files in `/vendor/cypresslab/gitelephant/src/...` or switch to older
Php executable. The changes to be made:

- Change import to use an alias and replace occurences in code
```php
use \GitElephant\Objects\Object as GEObject;
```
- Remove function argument typing, eg.
```php
// Before
public function outputContent(Object $obj, $treeish)

// After
public function outputContent($obj, $treeish)
```
