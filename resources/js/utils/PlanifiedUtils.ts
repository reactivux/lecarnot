import dayjs from "dayjs";

export default class PlanifiedUtils {
  static getTimes(openingTime: any, dayOfWeek: any) {
    // Extract the open and close times into separate arrays
    const openTimes = openingTime.map((time: any) => time.open_time);
    const closeTimes = openingTime.map((time: any) => time.close_time);
    // Convert times to Date objects for comparison
    const openTimeObjects = openTimes.map(
      (time: any) => new Date(`2000-01-01T${time}`)
    );
    const closeTimeObjects = closeTimes.map(
      (time: any) => new Date(`2000-01-01T${time}`)
    );

    // Find the earliest open time and latest close time
    const earliestOpenTime = new Date(Math.min(...openTimeObjects));
    const latestCloseTime = new Date(Math.max(...closeTimeObjects));
    // Generate the list of opening times from earliest open time to latest close time with 15-minute increments
    const openingTimeList = this.generateOpeningTimeList(
      earliestOpenTime,
      latestCloseTime,
      openingTime,
      dayOfWeek
    );
    return openingTimeList;
  }

  // Helper function to generate the list of opening times
  static generateOpeningTimeList(
    earliestTime: any,
    latestTime: any,
    openingTime: any,
    dayOfWeek: any
  ) {
    const openingTimeList = [];
    let currentTime = new Date(earliestTime);
    let targetTime = new Date();
    let currentDayOfWeek = targetTime.getDay();
    while (currentTime <= latestTime) {
      const currentHour = currentTime.getHours();
      const currentMinutes = currentTime.getMinutes();
      const isOpeningTime = openingTime.some((time: any) => {
        const openHour = parseInt(time.open_time.split(":")[0]);
        const openMinutes = parseInt(time.open_time.split(":")[1]);
        const closeHour = parseInt(time.close_time.split(":")[0]);
        const closeMinutes = parseInt(time.close_time.split(":")[1]);
        if (
          (currentHour === openHour && currentMinutes >= openMinutes) ||
          (currentHour === closeHour && currentMinutes <= closeMinutes) ||
          (currentHour > openHour && currentHour < closeHour)
        ) {
          return true;
        }
        return false;
      });
      if (isOpeningTime) {
        const hours = String(currentTime.getHours()).padStart(2, "0");
        const minutes = String(currentTime.getMinutes()).padStart(2, "0");
        targetTime.setHours(parseInt(hours), parseInt(minutes), 0, 0);
        if (new Date() < targetTime && dayOfWeek == currentDayOfWeek)
          openingTimeList.push(`${hours}:${minutes}`);
        else if (dayOfWeek != currentDayOfWeek) {
          openingTimeList.push(`${hours}:${minutes}`);
        }
      }
      currentTime.setMinutes(currentTime.getMinutes() + 15);
    }
    return openingTimeList;
  }

  static getDayOfWeekByIndex(index: any) {
    const daysOfWeek = [
      "Sunday",
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
    ];
    // Normalize the index in case it exceeds 0-6 range
    const normalizedIndex = index % 7;
    return daysOfWeek[normalizedIndex];
  }

  static getDaysArrayByMonth(workingTimes: any) {
    let nextDate = dayjs();
    let arrDates: any = [];
    let day_count = 0;
    // Filter the array to get objects with "openingTime" and length > 0
    const daysWithOpeningTime = workingTimes.filter((day: any) => day.hasOwnProperty("openingTime") && day.openingTime.length > 0);
    // Extract dayOfWeek values from the filtered objects
    const dayOfWeekValues = daysWithOpeningTime.map((day: any) => day.dayOfWeek);
    for (var i = 0; i <= 6; i++) {
      if (dayOfWeekValues.includes(nextDate.day()) && day_count < 4) {
        const dayExists = arrDates.some((item: any) => item.dayOfWeek === nextDate.day());
        if (!dayExists) {
          arrDates.push({
            name: nextDate.format("dddd"),
            date: nextDate.format("YYYY-MM-DD"),
            dayExiste: true,
            dayOfWeek: nextDate.day(),
          });
          day_count++;
        }
      }
      nextDate = nextDate.add(1, 'day');
    }
    return arrDates;
  }

}
