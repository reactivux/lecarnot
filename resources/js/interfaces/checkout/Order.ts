import { ElementsOrder } from "./elementsOrder";

export interface Order {
  order_by: string;
  type: string;
  is_paid: boolean;
  comment: any;
  delivery_address_id: any;
  cac_address_id: number;
  uuid: string;
  card_token: string;
  at_place: any;
  payment_at_checkout: any;
  code_number: any;
  table_id: any;
  fees: number;
  elementsOrder: ElementsOrder[];
  planified: boolean;
  planified_at: string;
  loyalty_percentage: number;
  loyalty_nb_orders: number;
}
