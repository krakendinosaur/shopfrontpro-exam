# Shopfrontpro Examination by Prince Ryan Sy

<a name="table-of-contents"></a>

## Table of Contents

- [Installation](#installation)
- [Exam 1](#exam-1)
- [Exam 2](#exam-2)
- [Exam 3](#exam-3)

## Installation [▲](#table-of-contents) <a name="installation"></a>

SSH:

    git clone git@github.com:princesy/shopfrontpro-exam.git

HTTPS:

    git clone https://github.com/princesy/shopfrontpro-exam.git

## Exam 1 [▲](#table-of-contents) <a name="exam-1"></a>

### Parse and convert each path into an array.

```
[
    '/home/user/folder1/folder2/kdh4kdk8.txt',
    '/home/user/folder1/folder2/565shdhh.txt',
    '/home/user/folder1/folder2/folder3/nhskkuu4.txt',
    '/home/user/folder1/iiskjksd.txt',
    '/home/user/folder1/folder2/folder3/owjekksu.txt',
]
```

### Running via CLI

```
    php convert.php
```

#### Sample Output

![Convert Sample Output - CLI](outputs/convert/cli.png?raw=true)

### Running via Browser / Web

Visit: http://localhost/shopfrontpro-exam/convert.php

#### Sample Output

![Convert Sample Output - Web](outputs/convert/web.png?raw=true)

## Exam 2 [▲](#table-of-contents) <a name="exam-2"></a>

### Convert the output of the first method into a tree array.

### Running via CLI

```
    php tree.php --depth=6 --leafs=3
```

#### Sample Output

![Convert Sample Output - CLI](outputs/tree/cli.png?raw=true)

### Running via Browser / Web

Visit: http://localhost/shopfrontpro-exam/tree.php?depth=6&leafs=3

#### Sample Output

![Convert Sample Output - Web](outputs/tree/web.png?raw=true)

## Exam 3 [▲](#table-of-contents) <a name="exam-3"></a>

### Generate random file paths.

### Running via CLI

```
    php random.php --base-path=/home/user/ --paths=10 --depth=6 --files=3
```

#### Sample Output

![Convert Sample Output - CLI](outputs/random/cli.png?raw=true)

### Running via Browser / Web

Visit: http://localhost/shopfrontpro-exam/random.php?base-path=/home/user/&paths=10&depth=6&files=3

#### Sample Output

![Convert Sample Output - Web](outputs/random/web.png?raw=true)

# Many Thanks
__Special shout-out Shopfrontpro for considering me for a wonderful job opportunity!__
