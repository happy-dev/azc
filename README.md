# AZC

## installation

```bash
cp src/wp-config-sample.php src/wp-config.php
# the config matches the one in docker-compose.yml
# re-generate the hashes if you prefer
```

## start / stop

```bash
# start
> docker-compose up -d

# stop
> docker-compose down
```

> Obviously you need Docker !

> If you have a problem, call [Batman](mailto:jonathan@happy-dev.fr)

## Deployment

- development (`dev` branch)  
  [http://preprod.azc.archi](http://preprod.azc.archi)
- production (`master` branch)  
  [http://azc.archi](http://azc.archi)

**deploy only the `src` folder on the server**

> a nice deployment script might come in a probable future

## Misc

- Domain is handled by OVH account
- Hosting is handled by Always Data

## Team

- Frontend: Marjolaine
- President: Lory
- Backend: Nadir
- UX / Design: Sophie
- Fireman: Jonathan

