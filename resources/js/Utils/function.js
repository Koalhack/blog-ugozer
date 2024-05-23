export const capitalizeFirstLetter = (string) =>
    string.charAt(0).toUpperCase() + string.slice(1);

export const formatLaravelDate = (dateString) => {
    if (dateString === null || dateString === undefined) return "null";

    const date = new Date(dateString);
    return `${date.getDate().toString().padStart(2, "0")}/${date.getMonth().toString().padStart(2, "0")}/${date.getFullYear()} ${date.getHours().toString().padStart(2, "0")}:${date.getMinutes().toString().padStart(2, "0")}`;
};
