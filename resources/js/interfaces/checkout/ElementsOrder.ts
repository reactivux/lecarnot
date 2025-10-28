import { SubElementsOrder } from "./SubElementsOrder";

export interface ElementsOrder {
  UnitPriceSize: number
  price: number
  quantity: number
  comment: any
  product_id: number
  subElementsOrder: SubElementsOrder[],
  promo: Object
}