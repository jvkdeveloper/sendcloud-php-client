<?php

namespace Picqer\Carriers\SendCloud;

class SendCloud
{
    /**
     * The HTTP connection
     *
     * @var Connection
     */
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function invoices(): Invoice
    {
        return new Invoice($this->connection);
    }

    public function labels(): Label
    {
        return new Label($this->connection);
    }

    public function parcels(): Parcel
    {
        return new Parcel($this->connection);
    }

    public function shippingMethods(): ShippingMethod
    {
        return new ShippingMethod($this->connection);
    }

    public function users(): User
    {
        return new User($this->connection);
    }

    public function tracking(): Tracking
    {
        return new Tracking($this->connection);
    }

    public function senderAddresses(): SenderAddress
    {
        return new SenderAddress($this->connection);
    }

    public function getShippingPrice($request)
    {
        return $this->connection->get('https://panel.sendcloud.sc/api/v2/shipping-price', [
            'shipping_method_id' => $request['shipping_method_id'],
            'from_country' => $request['from_country'],
            'to_country' => $request['to_country'],
            'weight' => $request['weight'],
            'weight_unit' => 'gram',
        ]);
    }

    /**
     * SenderAddress Resource
     *
     * @return SenderAddress
     * @deprecated Inconsistent nameing, use senderAddresses()
     */
    public function sender_addresses()
    {
        return $this->senderAddresses();
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
