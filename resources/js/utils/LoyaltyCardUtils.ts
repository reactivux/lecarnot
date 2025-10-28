
export default class LoyaltyCardUtils {
  static prepareLoyaltyCard(configLoyaltyCard, loyaltyCard) {
    let arr = [];
    for (var i = 0; i < configLoyaltyCard?.nb_orders; i++) {
      arr.push({
        index: i,
        checked:
          loyaltyCard != null && loyaltyCard?.nb_orders > i ? true : false,
        percentage:
          configLoyaltyCard?.nb_orders - 1 == i
            ? configLoyaltyCard?.percentage
            : null,
      });
    }
    return arr;
  }
}
