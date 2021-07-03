---

---

# The Nivenly.com Public API

The public APIs come with no guarantee what so ever.

All APIs will return valid `json`.


## [/client](https://nivenly.com/client) 

**GET**

The `/client` endpoint is used for a reverse DNS lookup and `network` probe.

The endpoint uses the `nmap` C library to probe the requesting public address.

⏰ Note: A full scan can sometimes take several minutes to complete depending on your network.
The endpoint will cache all addresses, and results will persist until the next request. Th
e API will always return the most recent complete scan.

 - **Request 1** The IP address is logged and an empty `json` object is returned.
 - **Request 2** A second request is sent and the result from **Request 1** is returned.
 - **Request 3** A third request is sent and the result from **Request 2** is returned.

```bash 
curl -L nivenly.com/client
```

would result in a reverse `nmap` scan of:

```bash 
nmap \
    --osscan-guess \
    -O --traceroute \
    -D 160.153.77.70,75.2.104.223,174.138.63.167,173.255.226.133 \
    -sS \
    -sV \
    -oX - <your-public-ip>
```

⚠ Note: all public addresses are logged, and all scan results should be considered publically available.

---

_Nivenly.com and its related assets, tools, and API endpoints are provided for convenience and educational purposes only.
The website's source code and its Apache2 license is hosted online at github.com/kris-nova/nivenly.com.
By using this website you agree to never use these tools for any illegal or malicious activity, and to adhere to ethical and responsible disclosure and practice. The owner and operator of this website accepts no responsibility for the usage of these tools in any way.
These tools should not be used by anyone._