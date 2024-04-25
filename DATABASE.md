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

```shell
docker run -d --env-file ./Documents/ora_db_env.dat -p 1521:1521 --name oracle-std --shm-size="8g" container-registry.oracle.com/database/standard
```

## Note: 

- The `./Documents/ora_db_env.dat` could be find base on what your terminal directory guess.
- The `-p` means server port.
- The `--shm-size="8g"` is the recommendation base on given guidelines by Oracle
- The `-d` means detachment mode.