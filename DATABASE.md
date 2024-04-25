# Quick Guide (Tutorial for Docker)

```shell
docker login container-registry.oracle.com
```

Credentials
- k80308392@gmail.com
- @Eyelashmelon4zeros

```shell
docker pull container-registry.oracle.com/database/enterprise:latest
```

```shell
#####################################################################
## Copyright(c) Oracle Corporation 1998,2016. All rights reserved. ##
##                     Docker OL7 db12c dat file                   ##
##                                                                 ##
#####################################################################

##-------------------------------------------------------------------
## Specify the basic params..
##-------------------------------------------------------------------

## db sid (name)
## default : ORCL
## cannot be longer than 8 characters

DB_SID=OraDoc

## db passwd
## default : Oracle

DB_PASSWD=lash0000

## db domain
## default : localdomain

DB_DOMAIN=my.domain.com

## db bundle
## default : basic
## valid : basic / high / extreme
## (high and extreme are only available for enterprise edition)

DB_BUNDLE=basic

## end
```