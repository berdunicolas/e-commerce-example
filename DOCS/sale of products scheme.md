# Scheme "sale of products"

## 1. USERS
The standard model for this:

```
USERS
```


## 2. CUSTOMERS
Like as users, but with configurable authentication:

```
CUSTOMERS
first_name
last_name
email
phone
```

## 3. PRODUCTS 
Items to sell:
```
PRODUCTS
id?
code
name
description
price
stock
unit
category_id
discount
stock_alert_threshold
```

## 4. PURCHARSE ORDERS
Because, customers have their products in cart until they buy them
```
PURCHARSE_ORDERS
id
customer_id
status (IN_CART, PENDING, PAID, SHIPED, COMPLETED, CANCELLED)
amount
payment_method
shipping_address
```

## 5. ORDER PRODUCTS
Related to products and purcharse orders:
```
ORDER_PRODUCTS
id
order_id
product_id
quantity
price_per_unit
subtotal
```


## 6. PAYMENTS
It's obvious men, come on:
```
PAYMENTS
id
order_id
amount
payment_method (CREDIT_CARD, MERCADO_PAGO, CASH, etc...)
status (PENDING, PAID, FAILED)
```

## 7. SHIPMENTS
```
SHIPMENTS
id
order_id
tracking_number
carrier (CorreoArgentino, OCA)
status (PENDING, SHIPED, DELIVERED, CANCELED)
shiped_at
delivered_at
```

## 8. INVENTORY LOGS
For inventory movements:
```
INVENTORY_LOGS
id
product_id
change_type (INCREASE, DECREASE)
quantity
reason (PURCHARSE, RETURN, MANUAL_ADJUSTMENT, etc...)
```


## 9. DISCOUNTS OR PROMOTIONS
It's possible that we need to use rules on discounts and promotions.
```
PROMOTIONS
id
name
description
discount_type (PERCENTAGE, FIXED_AMOUNT)
discount_value
start_date
end_date
product_id (nullable, para descuentos específicos por producto)
```


## 10. DASHBOARDS / REPORTES
Para análisis y estadísticas, tablas o vistas relacionadas con reportes:

- SALES_REPORTS: Para registrar métricas de ventas como ventas totales, promedio, etc.
- CUSTOMER_ACTIVITY_LOGS: Para registrar la actividad del cliente, como visitas al sitio o carritos abandonados.

