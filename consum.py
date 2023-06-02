import requests
import json

url = "http://localhost/taqueria/ws/bitacora.php"

payload = {}
files={}
headers = {
  'Cookie': 'PHPSESSID=k9q0bv89ovdib1dioi9c3309p7'
}

response = requests.request("GET", url, headers=headers, data=payload, files=files)
datajson = json.loads(response.content)

#print(response.text)

import datetime

# Obtener la fecha y hora actuales
now = datetime.datetime.now()

# Formatear la fecha y hora como una cadena
fecha = now.strftime('%Y_%m_%dx') # formato: AAAA-MM-DD
hora = now.strftime('%H%M%S') # formato: HH:MM:SS

# Imprimir la fecha y hora
#print(datajson[1]['fecha_pedido'])
#print(len(datajson))

#for n in range(len(datajson)):
#   print(datajson[n]['fecha_pedido'])
    
from reportlab.pdfgen import canvas

#c = canvas.Canvas("pdf/"+fecha+hora+".pdf")
from reportlab.platypus import SimpleDocTemplate, Table
from reportlab.lib.pagesizes import letter, landscape

# Crear datos para la tabla
data = [['Fecha','Pedido','Entrega','Contenido','Comentario','Cliente','Sucursal']]
for n in range(len(datajson)):
    data.append([datajson[n]['fecha_pedido'],
                  datajson[n]['hora_pedido'],
                  datajson[n]['hora_entrega'],
                  datajson[n]['pedido'], 
                  datajson[n]['comentario_general'], 
                  datajson[n]['cliente'], 
                  datajson[n]['sucursal']])

# Crear una tabla y especificar el ancho de cada columna
table = Table(data, colWidths=[60,60,60,190,100,100,100,60])

# Agregar estilo a la tabla
table.setStyle([
    ('BACKGROUND', (0, 0), (-1, 0), (0.7, 0.7, 0.7)),
    ('TEXTCOLOR', (0, 0), (-1, 0), (1, 1, 1)),
    ('ALIGN', (0, 0), (-1, -1), 'CENTER'),
    ('FONTNAME', (0, 0), (-1, 0), 'Helvetica-Bold'),
    ('FONTSIZE', (0, 0), (-1, 0), 14),
    ('BOTTOMPADDING', (0, 0), (-1, 0), 12),
    ('BACKGROUND', (0, 1), (-1, -1), (0.9, 0.9, 0.9)),
    ('TEXTCOLOR', (0, 1), (-1, -1), (0, 0, 0)),
    ('FONTNAME', (0, 1), (-1, -1), 'Helvetica'),
    ('FONTSIZE', (0, 1), (-1, -1), 12),
    ('BOTTOMPADDING', (0, 1), (-1, -1), 6),
    ('GRID', (0, 0), (-1, -1), 1, (0.7, 0.7, 0.7))
])

# Crear un documento y agregar la tabla
ruta = "pdf/"+fecha+hora+".pdf"
doc = SimpleDocTemplate(ruta, pagesize=landscape(letter))
elements = []
elements.append(table)
doc.build(elements)

#c.save()



url = "http://localhost/taqueria/ws/pdf.php"

payload = {'data[pdf]': ruta}
files=[

]
headers = {
  'Cookie': 'PHPSESSID=k9q0bv89ovdib1dioi9c3309p7'
}

response = requests.request("POST", url, headers=headers, data=payload, files=files)

print(response.text)