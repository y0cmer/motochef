import requests

api_token = 'your_api_token'
zone_id = 'your_zone_id'
domain = 'motochef.moto.com'
ip_address = 'your_server_ip'

headers = {
    'Authorization': f'Bearer {api_token}',
    'Content-Type': 'application/json',
}

data = {
    'type': 'A',
    'name': domain,
    'content': ip_address,
    'ttl': 3600,
}

response = requests.post(f'https://api.cloudflare.com/client/v4/zones/{zone_id}/dns_records', headers=headers, json=data)

if response.status_code == 200:
    print("DNS запис успішно додано!")
else:
    print("Помилка додавання DNS запису.")
