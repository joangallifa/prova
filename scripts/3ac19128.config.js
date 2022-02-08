'use strict';

angular.module("config", [])

.constant("ENV", "production")

.constant("BASE_API_URL", "https://testaz.fje.edu/api")

.constant("LOCALSTORAGE_EXPIRATIONS", [
  {
    "key": "information",
    "expiration": 0
  },
  {
    "key": "favorites",
    "expiration": 300
  }
])

.constant("LOCALSTORAGE_DEFAULT_EXPIRATION", 300)

;
