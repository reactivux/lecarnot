import { ProductOrder } from "../interfaces/cart/ProductOrder";


export default class OrderUtils {
  static DiscountLoyaltyCard(
    totalPriceOrder,
    total_amount,
    fees,
    loyalty_card
  ) {
    if (totalPriceOrder > 0 && loyalty_card != null) {
      var discountPercentage = loyalty_card.percentage;
      var totalOrder = total_amount - fees;
      var discountDecimal = discountPercentage / 100;
      // Calculate the original total amount
      var originalTotal = totalOrder / (1 - discountDecimal);
      var discountAmount =
        originalTotal.toFixed(2) * discountDecimal.toFixed(2);
      return discountAmount.toFixed(2);
    }
    return 0;
  }
  static DiscountCodePromo(totalPriceOrder, promocode) {
    if (totalPriceOrder > 0 && promocode != null) {
      return parseFloat(totalPriceOrder * (promocode.percentage / 100)).toFixed(
        2
      );
    }
    return 0;
  }

  static prepareToPushProduct(product: ProductOrder) {
    product.groups?.forEach((groupObj, indexGrp) => {
      if (groupObj.button_type == "PlusMinusButton") {
        let subProducts = groupObj.sub_products.filter(
          (subProductObj) => subProductObj.quantity > 0
        );
        groupObj.sub_products = subProducts;
      } else if (groupObj.button_type == "RadioButton") {
        let subProducts = groupObj.sub_products.filter(
          (subProductObj) => subProductObj.checked
        );
        groupObj.sub_products = subProducts;
      }
    });
    let groups = product.groups?.filter(
      (groupObj) => groupObj.sub_products.length
    );
    product.groups = groups;
    return product;
  }
}
